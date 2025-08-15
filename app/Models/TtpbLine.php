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

    /**
     * Get the TTPB that owns the line.
     */
    public function ttpb()
    {
        return $this->belongsTo(Ttpb::class);
    }

    /**
     * Get the item associated with the line.
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * Get the lot associated with the line.
     */
    public function lot()
    {
        return $this->belongsTo(Lot::class);
    }
}
