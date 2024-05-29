<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Department extends Model
{
    use HasFactory,HasSlug;

    protected $guarded=['id'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function information(){
        return $this->hasMany(Information::class);
    }

    public function activity(){
        return $this->hasMany(DepartmentActivity::class);
    }

    public function publication(){
        return $this->hasMany(DepartmentPublication::class);
    }

    public function audio(){
        return $this->hasMany(DepartmentAudio::class);
    }

    public function video(){
        return $this->hasMany(DepartmentVideo::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
