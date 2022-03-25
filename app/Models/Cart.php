<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'price_id',
        'status',
        'confirmation'
    ];

    /**
     * User who buys the ticket
     */
    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Ticked to Buy
     */
    public function ticket() {
        return $this->belongsTo(Price::class, 'price_id');
    }
}
