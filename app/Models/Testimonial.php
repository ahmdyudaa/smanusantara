<?php

namespace App\Models;

use App\Enums\TestimonialStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $table = 'testimonials';

    protected $fillable = [
        'name',
        'status',
        'batch_year',
        'content',
        'image_url',
        'rating',
        'published_at',
        'is_active',
    ];

    protected $casts = [
        'status' => TestimonialStatus::class,
        'published_at' => 'datetime',
        'is_active' => 'boolean',
        'batch_year' => 'integer',
        'rating' => 'integer',
    ];
}
