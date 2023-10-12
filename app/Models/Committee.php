<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function notices()
    {
        return $this->hasMany(Notice::class)->latest();
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
