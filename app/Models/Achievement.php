<?php

namespace App\Models;

use App\Enums\AchievementCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $table = 'achievements';

    protected $fillable = [
        'title',
        'description',
        'category',
        'date',
        'image_url',
        'is_active',
    ];

    protected $casts = [
        'category' => AchievementCategory::class,
        'date' => 'date',
        'is_active' => 'boolean',
    ];
}
