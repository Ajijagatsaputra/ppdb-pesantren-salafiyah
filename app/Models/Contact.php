<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact_info';

    protected $fillable = [
        'title', 'subtitle', 'address', 'phone', 'email', 'is_active',
    ];
}
