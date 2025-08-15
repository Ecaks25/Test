<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bpg extends Model
{
    protected $fillable = [
        'no_bpg',
        'date',
        'supplier',
        'vehicle',
        'created_by',
        'posted_by',
        'posted_at',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
        'posted_at' => 'datetime',
    ];
}
