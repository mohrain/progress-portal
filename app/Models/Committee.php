<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Committee extends Model
{
    use HasFactory;
    use HasSlug;

    protected $guarded = [''];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function notices(): MorphMany
    {
        return $this->morphMany(Notice::class, 'noticeable')->latest();
    }

    public function activities(): MorphMany
    {
        return $this->morphMany(Activity::class, 'activitable')->latest();
    }

    public function downloads(): MorphMany
    {
        return $this->morphMany(Download::class, 'downloadable')->latest();
    }

    public function members()
    {
        return $this->hasMany(CommitteeMember::class);
    }

    public function committeeSecretary()
    {
        return $this->hasMany(CommitteeSecretary::class);
    }
}
