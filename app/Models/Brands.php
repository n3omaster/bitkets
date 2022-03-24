<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brands extends Model
{
    use HasFactory;

    public function getBrandLogoAttribute()
    {
        return Storage::disk(config('filesystems.disk'))->url($this->logo);
    }
}
