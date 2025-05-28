<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'background_image',
        'button_text',
        'button_link',
        'button_text_vidio',
        'vidios',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}
