<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wallet extends Model
{
    protected $table = 'Wallets';  
    protected $primaryKey = 'wallet_id'; // Custom primary key
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'user_id',
        'balance',
        'last_updated'
    ];

    protected $casts = [
        'balance' => 'decimal:2',
        'last_updated' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
