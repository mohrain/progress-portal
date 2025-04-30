<?php

namespace App\Models;

use App\ParliamentaryParty;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Wildside\Userstamps\Userstamps;

class Member extends Model
{
    use HasFactory, Userstamps, HasSlug;

    protected $guarded = ['id'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name_english')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('status', true);
    }

    public function scopeUnpublish($query)
    {
        return $query->where('status', false);
    }

    public function scopePositioned($query, $ascending = true)
    {
        return $query->orderBy('position', $ascending ? 'asc' : 'desc');
    }

    public function scopeCurrentElection($query)
    {
        return $query->where('election_id', settings('election_id'));
    }

    public function scopeOldElection($query)
    {
        return $query->whereNotIn('election_id', [settings('election_id')]);
    }

    public function election()
    {
        return $this->belongsTo(Election::class);
    }
    public function parliamentaryParty()
    {
        return $this->belongsTo(ParliamentaryParty::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function officeBearers()
    {
        return $this->hasMany(OfficeBearer::class);
    }

    public function officeDesignation()
    {
        return $this->belongsTo(OfficeBearerDesignation::class, 'office_bearer_designation_id');
    }

    public function committeeMembers()
    {
        return $this->hasMany(CommitteeMember::class);
    }
}
