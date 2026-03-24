<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'body',
    ];

    public function getImageUrlAttribute()
{
    return $this->image ? asset('uploads/' . $this->image) : asset('images/default-blog.jpg');
}
}
