<?php

namespace App\Livewire;

use App\Models\Booking;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class BookingForm extends Component
{
    public $full_name, $phone, $check_in, $check_out, $adults, $children, $time;
    public $room_id;


    protected $rules = [
        'room_id' => 'required|exists:rooms,id',
        'full_name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'check_in' => 'required|date',
        'check_out' => 'required|date|after_or_equal:check_in',
        'adults' => 'required|integer|min:1',
        'children' => 'nullable|integer|min:0',
        'time' => 'nullable|string|max:50',
    ];

    public function submit()
    {
        $validated = $this->validate([
            'room_id' => 'required|exists:rooms,id',
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after_or_equal:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'time' => 'nullable|string|max:50',
        ]);

        // Prevent double booking
        $exists = Booking::where('room_id', $this->room_id)->where('check_in', '<=', $this->check_out)->where('check_out', '>=', $this->check_in)->exists();

        if ($exists) {
            $this->addError('room_id', 'This room is already booked for the selected dates.');
            return;
        }

        // Save booking
        $booking = Booking::create($validated);

        // Send email to admin
        try {
            Mail::to('damalide20@gmail.com')->send(new \App\Mail\NewBookingMail($booking));
        } catch (\Exception $e) {
            // optional: log or ignore
        }
        // Reset form
        $this->reset();
    }

    public function render()
    {
        return view('livewire.booking-form');
    }
}
