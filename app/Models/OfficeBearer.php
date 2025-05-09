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

    public function scopeCurrentElection($query)
    {
        return $query->where('election_id', settings('election_id'));
    }

    public function scopeCurrent($query)
    {
        return $query->where('end', null);
    }

    public function scopeOld($query)
    {
        return $query->whereNotIn('end', ['']);
    }

    public function election()
    {
        return $this->belongsTo(Election::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function officeDesignation()
    {

        return $this->belongsTo(OfficeBearerDesignation::class, 'office_bearer_designation_id');
    }
}
