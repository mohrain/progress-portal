<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CommitteeMember extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function photoUrl(): string
    {
        return $this->photo
            ? Storage::url($this->photo)
            : 'https://upload.wikimedia.org/wikipedia/commons/c/cd/Portrait_Placeholder_Square.png';
    }

    public function committee()
    {
        return $this->belongsTo(Committee::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
