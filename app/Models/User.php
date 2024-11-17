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

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'google_id',
        'validate_token',
        'is_valid',
        'expired_date',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}