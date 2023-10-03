<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuchiType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function suchis()
    {
        return $this->hasMany(Suchi::class);
    }
}
