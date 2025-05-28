<?php

// app/Models/TeamMember.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',  
        'photo',
        'phone',
        'social_media',
        'is_active'
    ];

    protected $casts = [
        'social_media' => 'array',
        'is_active' => 'boolean'
    ];
}
