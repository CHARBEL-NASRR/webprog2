<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HostDetail extends Model
{
    protected $table = 'Host_Details';
    protected $primaryKey = 'host_id';  // Custom primary key
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'host_id',
        'user_id',
        'id_card'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
