<?php

namespace App\Livewire\Admin;

use App\Models\Booking;
use Livewire\Component;

class BookingsTable extends Component
{
    public function render()
    {
             return view('livewire.admin.bookings-table', [
            'bookings' => Booking::with('room')->orderBy('check_in', 'desc')->paginate(20),
        ]);
    }
}
