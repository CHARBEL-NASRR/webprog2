<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpotLocation extends Model
{
    protected $table = 'Spot_Locations';
    protected $primaryKey = 'location_id';  // Custom primary key
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'location_id',   
        'spot_id',
        'address',
        'city',
        'district'
    ];

    public function parkingSpot(): BelongsTo
    {
        return $this->belongsTo(ParkingSpot::class, 'spot_id');
    }
}
 