<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class Download extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fileUrl()
    {
        return Storage::url($this->file);
    }

    public function downloadable(): MorphTo
    {
        return $this->morphTo();
    }
}
