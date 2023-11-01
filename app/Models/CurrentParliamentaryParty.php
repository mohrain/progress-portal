<?php

namespace App\Models;

use App\ParliamentaryParty;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentParliamentaryParty extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopePositioned($query, $ascending = true)
    {
        return $query->orderBy('position', $ascending ? 'asc' : 'desc');
    }

    public function parliamentaryParty()
    {
        return $this->belongsTo(ParliamentaryParty::class);
    }

}
