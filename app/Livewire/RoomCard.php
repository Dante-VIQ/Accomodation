<?php

namespace App\Livewire;

use App\Models\Room;
use Livewire\Component;

class RoomCard extends Component
{
    public $rooms;

    public function mount()
    {
        $this->rooms = Room::all();
    }


    public function render()
    {
        return view('livewire.room-card');
    }
}
