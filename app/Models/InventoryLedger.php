<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryLedger extends Model
{
    protected $fillable = [
        'txn_date',
        'ref_type',
        'ref_id',
        'item_id',
        'location_id',
        'lot_id',
        'direction',
        'qty',
        'balance_after',
        'created_by',
    ];

    protected $casts = [
        'txn_date' => 'date',
    ];
}
