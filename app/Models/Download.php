<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Download extends Model
{
    use HasFactory;

    public function downloadable(): MorphTo
    {
        return $this->morphTo();
    }
}
