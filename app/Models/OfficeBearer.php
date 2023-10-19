<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeBearer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopePositioned($query, $ascending = true)
    {
        return $query->orderBy('position', $ascending ? 'asc' : 'desc');
    }
    
    public function election()
    {
        return $this->belongsTo(Election::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
