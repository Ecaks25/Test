<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    protected $fillable = [
        'item_id',
        'location_id',
        'lot_number',
        'qty_initial',
        'qty_remaining',
        'status',
    ];
}
