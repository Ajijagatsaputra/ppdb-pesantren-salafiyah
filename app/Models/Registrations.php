<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registrations extends Model
{
    protected $table = 'registrations';
    protected $fillable = [
        'full_name',
        'phone',
        'school_origin',
        'birth_date',
        'nisn',
        'gender',
        'document_path',
        'payment_status',
    ];
    
    
    protected $casts = [
        'payment_status' => 'string', // enum disimpan sebagai string
    ];
    
}
