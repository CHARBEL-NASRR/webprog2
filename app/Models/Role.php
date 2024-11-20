<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    protected $table = 'Roles';
    protected $primaryKey = 'role_id';  // Custom primary key
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'role_name',  // Only include mass assignable fields
    ];

    public function userRoles(): HasMany
    {
        return $this->hasMany(UserRole::class);
    }

    public function users(): HasMany
    {
        return $this->belongsToMany(User::class, 'user_roles', 'role_id', 'user_id');
    }
}
