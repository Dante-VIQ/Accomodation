<?php

namespace App\Livewire;

use App\Mail\BookingConfirmation;
use App\Mail\BookingNotification;
use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class BookingForm extends Component
{
    public $full_name;

    public $phone;

    public $email;

    public $special_requests;

    public $check_in;

    public $check_out;

    public $preferred_time;

    public $adults = 1;

    public $children = 0;

    public $room_id;

    public $terms = false;

    public $selected_room;

    public $nights = 0;

    public $total = 0;

    protected $rules = [
        'full_name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|email',
        'check_in' => 'required|date|after_or_equal:today',
        'check_out' => 'required|date|after:check_in',
        'adults' => 'required|integer|min:1',
        'children' => 'integer|min:0',
        'room_id' => 'required|exists:rooms,id',
        'terms' => 'accepted',
    ];

    public function mount()
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }
        $this->full_name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->phone = auth()->user()->phone ?? '';
    }

    public function selectRoom($roomId)
    {
        $this->room_id = $roomId;
        $this->selected_room = Room::find($roomId);
        $this->calculateNightsAndTotal();
    }

    public function updatedCheckIn()
    {
        $this->calculateNightsAndTotal();
    }

    public function updatedCheckOut()
    {
        $this->calculateNightsAndTotal();
    }

    protected function calculateNightsAndTotal()
    {
        if ($this->check_in && $this->check_out && $this->selected_room) {
            $checkIn = Carbon::parse($this->check_in);
            $checkOut = Carbon::parse($this->check_out);
            $this->nights = $checkOut->diffInDays($checkIn);
            $this->total = $this->nights * $this->selected_room->price;
        } else {
            $this->nights = 0;
            $this->total = 0;
        }
    }

    public function save()
    {
        $this->validate();

        // Check availability
        if (! Booking::isAvailable($this->room_id, $this->check_in, $this->check_out)) {
            $this->addError('room_id', 'The selected room is not available for the chosen dates.');

            return;
        }
        if (! Auth::check()) {
            return redirect()->route('login');
        }
        // Create booking
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'room_id' => $this->room_id,
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'adults' => $this->adults,
            'children' => $this->children,
            'special_requests' => $this->special_requests,
            'preferred_time' => $this->preferred_time,
            'total_price' => $this->total,
            'status' => 'pending',
            'payment_status' => 'unpaid',
        ]);

        // Send emails
        Mail::send(new BookingConfirmation($booking)); // The recipient is set inside the mailable
        Mail::send(new BookingNotification($booking));

        session()->flash('message', 'Your booking has been submitted successfully! A confirmation email has been sent.');

        return redirect()->route('my-bookings');
    }

    public function render()
    {
        $rooms = Room::active()->get();

        return view('livewire.booking-form', compact('rooms'));
    }
}
