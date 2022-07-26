<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $casts = [
        'time' => 'datetime',
    ];

    protected $fillable = [
        'name',
        'time',
        'cost',
        'description',
        'capacity',
    ];
}
