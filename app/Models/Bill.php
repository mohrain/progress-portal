<?php

namespace App\Models;

use App\BillType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Wildside\Userstamps\Userstamps;

class Bill extends Model
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

    public function scopePublished($query)
    {
        return $query->where('active', true);
    }

    public function scopeUnpublish($query)
    {
        return $query->where('active', false);
    }
    public function billType()
    {
        return $this->belongsTo(BillType::class);
    }

    public function billCategory()
    {
        return $this->belongsTo(BillCategory::class);
    }

    public function ministry()
    {
        return $this->belongsTo(Ministry::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }


}
