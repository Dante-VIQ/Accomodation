<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Service;
use App\Models\Blog;

class Dashboard extends Component
{
    public $totalBookings;
    public $pendingBookings;
    public $totalRooms;
    public $totalServices;
    public $totalBlogPosts;
    public $recentBookings;

    public function mount()
    {
        $this->totalBookings = Booking::count();
        $this->pendingBookings = Booking::where('status', 'pending')->count();
        $this->totalRooms = Room::count();
        $this->totalServices = Service::count();
        $this->totalBlogPosts = Blog::count();
        $this->recentBookings = Booking::with('user', 'room')->latest()->take(5)->get();
    }

    public function render()
    {
        return view('livewire.dashboard')->layout('layouts.admin');
    }
}