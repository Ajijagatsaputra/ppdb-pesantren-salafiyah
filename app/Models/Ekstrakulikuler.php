<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuler extends Model
{
    use HasFactory;

    protected $table = 'ekstrakulikuler';

    protected $fillable = ['nama', 'kategori', 'deskripsi', 'gambar'];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}
