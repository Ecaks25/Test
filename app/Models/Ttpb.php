<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ttpb extends Model
{
    protected $fillable = [
        'number',
        'date',
        'from_location_id',
        'to_location_id',
        'created_by',
        'notes',
        'status',
        'posted_by',
        'posted_at',
    ];

    protected $casts = [
        'date' => 'date',
        'posted_at' => 'datetime',
    ];

    /**
     * Get the lines associated with the TTPB.
     */
    public function lines()
    {
        return $this->hasMany(TtpbLine::class);
    }

    /**
     * Get the source location.
     */
    public function fromLocation()
    {
        return $this->belongsTo(Location::class, 'from_location_id');
    }

    /**
     * Get the destination location.
     */
    public function toLocation()
    {
        return $this->belongsTo(Location::class, 'to_location_id');
    }
}
