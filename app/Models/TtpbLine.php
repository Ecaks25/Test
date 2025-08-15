<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TtpbLine extends Model
{
    protected $fillable = [
        'ttpb_id',
        'item_id',
        'lot_id',
        'qty_requested',
        'qty_actual',
        'loss_qty',
        'loss_percent',
        'coly',
        'spec',
        'remarks',
    ];
}
