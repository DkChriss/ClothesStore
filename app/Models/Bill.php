<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bill';

    protected $fillable = [
        'name',
        'phone',
        'city',
        'address',
        'provincia',
        'email',
        'payment',
        'list_products',
        'user_id'
    ];

    protected $casts = [
        'payment' => 'array',
        'list_products' => 'array'
    ];
}
