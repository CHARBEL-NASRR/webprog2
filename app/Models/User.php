<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable implements AuthenticatableContract
{
    use  HasApiTokens,HasFactory,Notifiable;

    protected $table = 'Users';  
    protected $primaryKey = 'user_id';  // Custom primary key
    public $incrementing = true;        
    protected $keyType = 'int';  

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'password',
        'status',
        'google_id',
        'validate_token',
        'is_valid',
        'expired_date',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function wallet(): HasOne
    {
        return $this->hasOne(Wallet::class);
    }

    public function parkingSpots(): HasMany
    {
        return $this->hasMany(ParkingSpot::class, 'host_id');
    }

    public function spotAmenities(): HasMany
    {
        return $this->hasMany(SpotAmenity::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}