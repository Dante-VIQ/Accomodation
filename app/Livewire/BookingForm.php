<?php

namespace App\Livewire;

use App\Models\Booking;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BookingForm extends Component
{
    public $full_name, $phone, $check_in, $check_out, $adults, $children, $time;
    public $room_id;
    public $showForm = false; // Add this

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

    public function mount()
    {
        $this->showForm = false;
    }
    // Add methods to show/hide modal
    public function showForm()
    {
        $this->showForm = true;
    }

    public function closeForm()
    {
        $this->showForm = false;
        $this->reset(); // Optional: clear form when closing
    }

    public function save()
    {
        Log::info('Save method called', $this->all());

        try {
            $validated = $this->validate();
            Log::info('Validation passed', $validated);

            // Check for existing bookings
            $exists = Booking::where('room_id', $validated['room_id'])
                ->where(function ($q) use ($validated) {
                    $q->whereBetween('check_in', [$validated['check_in'], $validated['check_out']])
                        ->orWhereBetween('check_out', [$validated['check_in'], $validated['check_out']])
                        ->orWhere(function ($q2) use ($validated) {
                            $q2->where('check_in', '<=', $validated['check_in'])->where('check_out', '>=', $validated['check_out']);
                        });
                })
                ->exists();

            if ($exists) {
                $this->addError('room_id', 'This room is already booked for the selected dates.');
                Log::warning('Booking conflict detected');
                return;
            }

            // Save booking
            $booking = Booking::create($validated);
            Log::info('Booking created successfully', ['id' => $booking->id]);

            // Send email
            try {
                Mail::to('damalide20@gmail.com')->queue(new \App\Mail\NewBookingMail($booking));
            } catch (\Exception $e) {
                Log::error('Email failed: ' . $e->getMessage());
            }

            session()->flash('message', 'Booking submitted successfully!');

            // Don't reset immediately - let user see success message
            // $this->reset();
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed', ['errors' => $e->errors()]);
            throw $e;
        } catch (\Exception $e) {
            Log::error('Booking failed: ' . $e->getMessage());
            session()->flash('error', 'There was an error submitting your booking. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.booking-form');
    }
}
