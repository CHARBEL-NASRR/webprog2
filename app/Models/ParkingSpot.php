<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;


class ParkingSpot extends Model
{
    protected $table = 'Parking_Spots';
    protected $primaryKey = 'spot_id';  // Custom primary key
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'spot_id',
        'host_id', 
        'longitude',
        'latitude',
        'price_per_hour',
        'car_type',
        'title',
        'main_description',
        'overall_rating',
        'status'
    ];

    public function host(): BelongsTo
    {
        return $this->belongsTo(User::class, 'host_id');
    }

    public function amenities(): HasOne
    {
        return $this->hasOne(SpotAmenity::class, 'spot_id');
    }

    public function availabilities(): HasMany
    {
        return $this->hasMany(Availability::class, 'spot_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'spot_id');
    }

    public function locations(): HasMany
    {
        return $this->hasMany(SpotLocation::class, 'spot_id');
    }
}
