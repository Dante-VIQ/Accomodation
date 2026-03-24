<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'description',
        'category',
        'price',
        'price_unit',
        'duration',
        'group_size',
        'features',
        'is_popular',
        'full_description',
        'display_order',
        'is_active'
    ];

    protected $casts = [
        'features' => 'array',
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2'
    ];

    protected $attributes = [
        'is_active' => true,
        'is_popular' => false,
        'display_order' => 0,
        'price_unit' => '/person'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePopular($query)
    {
        return $query->where('is_popular', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

public function getImageUrlAttribute()
{
    return $this->image ? asset('uploads/' . $this->image) : asset('images/default-service.jpg');
}
    
    public function getFeaturesArrayAttribute()
    {
        return is_array($this->features) ? $this->features : json_decode($this->features, true) ?? [];
    }
}