<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $table = 'Availability';
    protected $primaryKey = 'availability_id'; // Custom primary key
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'availability_id', 
        'spot_id',
        'start_time_availability',
        'end_time_availability',
        'day'
    ];

    protected $casts = [
        'start_time_availability' => 'datetime',
        'end_time_availability' => 'datetime'
    ];

    public function parkingSpot(): BelongsTo
    {
        return $this->belongsTo(ParkingSpot::class, 'spot_id');
    }
}
