<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Booking;

class Bookings extends Component
{
    use WithPagination;

    public $statusFilter = '';
    public $search = '';

    protected $queryString = ['statusFilter', 'search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function updateStatus($id, $status)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = $status;
        $booking->save();

        session()->flash('message', 'Booking status updated.');
    }

    public function render()
    {
        $bookings = Booking::with('user', 'room')
            ->when($this->statusFilter, fn($q) => $q->where('status', $this->statusFilter))
            ->when($this->search, function ($q) {
                $q->whereHas('user', fn($q) => $q->where('name', 'like', "%{$this->search}%"))
                  ->orWhereHas('room', fn($q) => $q->where('name', 'like', "%{$this->search}%"))
                  ->orWhere('id', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.bookings', compact('bookings'))->layout('layouts.admin');
    }
}