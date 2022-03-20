<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    /**
     * Media files associated
     * @return \App\Models\Media
     */
    public function media()
    {
        return $this->hasMany(Media::class);
    }
}
