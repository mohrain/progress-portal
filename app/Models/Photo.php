<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getUrl(): string
    {
        return Storage::url($this->path);
    }

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}
