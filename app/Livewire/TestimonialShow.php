<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Testimonial;

class TestimonialShow extends Component
{
    public $testimonials;

    public function mount()
    {
        // Load only approved testimonials
        $this->testimonials = Testimonial::where('approved', true)
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.testimonial-show');
    }
}
