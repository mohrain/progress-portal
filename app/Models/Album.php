<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    public function previewPhotos(): HasMany
    {
        return $this->hasMany(Photo::class)->latest()->limit(4);
    }
}
