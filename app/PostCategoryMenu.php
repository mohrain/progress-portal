<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class PostCategoryMenu extends Model
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
