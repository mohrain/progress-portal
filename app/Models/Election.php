<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function officeBearers()
    {
        return $this->hasMany(OfficeBearer::class);
    }
}
