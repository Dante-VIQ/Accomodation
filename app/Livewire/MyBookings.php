<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use App\Mail\BookingCancelled;
use Illuminate\Support\Facades\Mail;


class MyBookings extends Component
{
    public $bookings;

    public function mount()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $this->loadBookings();
    }

    public function loadBookings()
    {
        $this->bookings = auth()->user()->bookings()->with('room')->latest()->get();
    }

    public function cancel($id)
    {
        $booking = Booking::where('user_id', auth()->id())->findOrFail($id);
        
        // Only allow cancellation if booking is pending or confirmed and not in the past
        if (in_array($booking->status, ['pending', 'confirmed']) && $booking->check_in > now()) {
            $booking->status = 'cancelled';
            $booking->save();

            // Send cancellation email
            Mail::to(auth()->user()->email)->send(new BookingCancelled($booking));
            // Optionally notify manager

            session()->flash('message', 'Booking cancelled successfully.');
            $this->loadBookings();
        } else {
            session()->flash('error', 'This booking cannot be cancelled.');
        }
    }

    public function render()
    {
        return view('livewire.my-bookings');
    }
}