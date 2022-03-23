<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Related Models:
    // Pricing (Could Be many diferente price tickets types)
    // Media (Can have multiple meda files, the first one must be the principal)

    // Detectable by its slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Event Owner
     * @return \App\Models\User
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Price tickets
     * @return \App\Models\Price
     */
    public function price()
    {
        return $this->hasMany(Price::class);
    }

    /**
     * Media files associated
     * @return \App\Models\Media
     */
    public function media()
    {
        return $this->hasMany(Media::class)
            ->withDefault([
                'name' => config('app.name'),
                'image' => 'events/Bitcoin-por-la-Libreta.png',
                'event_id' => 1
            ]);
    }
}
