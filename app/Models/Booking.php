<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['room_id', 'full_name', 'phone', 'check_in', 'check_out', 'adults', 'children', 'time'];
    protected $casts = [
      'check_in' => 'date',
      'check_out' => 'date',
    ];

      public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
