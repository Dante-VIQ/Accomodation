<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Testimonial;
use Livewire\WithFileUploads;

class TestimonialCard extends Component
{
    use WithFileUploads;

    public $name;
    public $role;
    public $message;
    public $avatar; // image upload

    public function mount()
    {
        // if (!auth()->check()) {
        //     abort(403, 'You must login.');
        // }

        $hasBooking = Booking::where('user_id', auth()->id())
            ->where('status', 'completed')
            ->exists();

        if (!$hasBooking) {
            abort(403, 'Only guests with completed bookings can submit testimonials.');
        }
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
            'avatar' => 'nullable|image|max:1024',
        ]);

        $avatarPath = null;

        if ($this->avatar) {
            $avatarPath = $this->avatar->store('testimonials', 'public');
        }

        Testimonial::create([
            'name' => $this->name,
            'role' => $this->role,
            'message' => $this->message,
            'avatar' => $avatarPath,
            'approved' => false, // admin approves manually
        ]);

        // Reset form fields
        $this->reset(['name', 'role', 'message', 'avatar']);

        session()->flash('success', 'Thank you! Your testimonial has been submitted for review.');
    }

    public function render()
    {
        return view('livewire.testimonial-card');
    }
}
