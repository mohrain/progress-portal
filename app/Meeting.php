<?php

namespace App;

use App\Models\MeetingType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Wildside\Userstamps\Userstamps;

class Meeting extends Model
{
    use HasFactory, Userstamps, HasSlug;

    protected $guarded = ['id'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeActive($query)
    {
        return $query->where('status', "active");
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', "completed");
    }

    public function scopeCanceled($query)
    {
        return $query->where('status', "canceled");
    }

    public function scopeAssembly($query)
    {
        return $query->where('type', true);
    }

    public function scopeCommittee($query)
    {
        return $query->where('type', false);
    }

    public function meetingType()
    {
        return $this->belongsTo(MeetingType::class);
    }
}
