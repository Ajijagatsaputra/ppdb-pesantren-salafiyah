<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PageContent extends Model
{
    protected $fillable = [
        'section',
        'key',
        'value',
        'type',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scope untuk section tertentu
    public function scopeForSection($query, $section)
    {
        return $query->where('section', $section)->where('is_active', true);
    }

    // Helper untuk mendapatkan value berdasarkan type
    public function getDisplayValueAttribute()
    {
        switch ($this->type) {
            case 'image':
                return $this->value ? Storage::url($this->value) : null;
            case 'json':
                return json_decode($this->value, true);
            default:
                return $this->value;
        }
    }

    // Static method untuk mendapatkan content dengan mudah
    public static function get($section, $key, $default = '')
    {
        $content = static::where('section', $section)
            ->where('key', $key)
            ->where('is_active', true)
            ->first();

        return $content ? $content->display_value : $default;
    }

    // Method untuk mendapatkan semua content dalam section
    public static function getSection($section)
    {
        return static::forSection($section)
            ->orderBy('order')
            ->get()
            ->keyBy('key');
    }
}
