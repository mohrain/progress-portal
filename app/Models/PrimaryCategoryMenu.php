<?php

namespace App\Models;

use App\PostCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class PrimaryCategoryMenu extends Model
{
    use HasFactory, Userstamps;

    protected $guarded = [];

    public function scopePositioned($query, $ascending = true)
    {
        return $query->orderBy('position', $ascending ? 'asc' : 'desc');
    }

    public function postCategory()
    {
        return $this->belongsTo(PostCategory::class);
    }
}
