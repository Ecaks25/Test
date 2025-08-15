<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockBalance extends Model
{
    protected $fillable = [
        'item_id',
        'location_id',
        'lot_id',
        'qty',
    ];
}
