<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
       
        'description',
        'price',
        'category',
        'size',
        'capacity',
        'bed_type',
        'badge',
        'best_season',
        'amenities',
        'images',
        'rating',
        'review_count',
        'is_popular',
        'is_featured',
        'display_order',
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'rating' => 'decimal:2',
        'amenities' => 'array',
        'images' => 'array',
        'is_popular' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'review_count' => 'integer',
        'display_order' => 'integer',
        'capacity' => 'integer'
    ];

    protected $attributes = [
        'is_active' => true,
        'is_popular' => false,
        'is_featured' => false,
        'display_order' => 0,
        'rating' => 5.0,
        'review_count' => 0
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

public function getImageUrlAttribute()
{
    return $this->image ? asset('uploads/' . $this->image) : asset('images/default-room.jpg');
}

public function getGalleryImagesAttribute()
{
    $images = $this->images ?? [];
    if (empty($images)) {
        return [$this->image_url];
    }
    return array_map(function($image) {
        return asset('uploads/' . $image);
    }, $images);
}

    public function getAmenitiesArrayAttribute()
    {
        return is_array($this->amenities) ? $this->amenities : json_decode($this->amenities, true) ?? [];
    }
}