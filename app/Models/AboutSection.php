<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $fillable = [
        'title',
        'image',
        'description', 
        'facilities',
        'thumbnail',
        'video_link',
        'is_active'
    ];

    protected $casts = [
        'facilities' => 'array',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getFacilitiesListAttribute()
    {
        return implode(', ', $this->facilities ?? []);
    }
}