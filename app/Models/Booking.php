<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'room_id',
        'check_in',
        'check_out',
        'adults',
        'children',
        'special_requests',
        'preferred_time',
        'status',
        'total_price',
        'payment_status',
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
        'total_price' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

public function room()
{
    return $this->belongsTo(Room::class);
}

    // Scope to check if a room is already booked for overlapping dates (excluding cancelled)
    public static function isAvailable($roomId, $checkIn, $checkOut, $excludeBookingId = null)
    {
        return !self::where('room_id', $roomId)
            // ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out', [$checkIn, $checkOut])
                    ->orWhere(function ($q) use ($checkIn, $checkOut) {
                        $q->where('check_in', '<=', $checkIn)
                          ->where('check_out', '>=', $checkOut);
                    });
            })
            ->when($excludeBookingId, function ($q, $id) {
                $q->where('id', '!=', $id);
            })
            ->exists();
    }
}