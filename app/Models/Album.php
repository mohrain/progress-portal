<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function previewPhoto(): HasOne
    {
        return $this->hasOne(Photo::class)->latest();
    }
}
