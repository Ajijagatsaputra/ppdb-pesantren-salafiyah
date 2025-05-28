<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    protected $table = 'contact_info';

    protected $fillable = [
        'address',
        'phone',
        'email',
        'whatsapp',
        'maps_embed',
        'social_media',
        'office_hours',
        'is_active'
    ];

    protected $casts = [
        'social_media' => 'array',
        'office_hours' => 'array',
        'is_active' => 'boolean'
    ];
}
