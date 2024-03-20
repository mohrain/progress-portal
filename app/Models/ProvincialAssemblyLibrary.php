<?php

namespace App\Models;

use App\Document;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Wildside\Userstamps\Userstamps;

class ProvincialAssemblyLibrary extends Model
{
    use HasFactory, Userstamps;

    protected $guarded = ['id'];


    public function scopePublished($query)
    {
        return $query->where('status', true);
    }

    public function scopeUnpublish($query)
    {
        return $query->where('status', false);
    }

    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }
}
