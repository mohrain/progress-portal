<?php

namespace App\Models;

use App\User;
use App\Ward;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Wildside\Userstamps\Userstamps;

class Employee extends Model
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', true);
    }

    public function scopeUnpublish($query)
    {
        return $query->where('status', false);
    }
    public function scopeCurrentEmployee($query)
    {
        return $query->where('end_date', null);
    }
    public function scopeOldEmployee($query)
    {
        return $query->whereNotNull('end_date');
    }

    public function scopePositioned($query, $ascending = true)
    {
        return $query->orderBy('position', $ascending ? 'asc' : 'desc');
    }

    public function employeeDesignation()
    {
        return $this->belongsTo(EmployeeDesignation::class);
    }

    public function informationOfficers()
    {
        return $this->hasMany(InformationOfficer::class);
    }

    public function committeeSecretary()
    {
        return $this->hasOne(CommitteeSecretary::class);
    }

    public function committeeSecretaries()
    {
        return $this->hasMany(CommitteeSecretary::class);
    }

    public function department()
    {
        return $this->hasOne(Department::class);
    }
    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    // public function ward()
    // {
    //     return $this->hasOne(Ward::class);
    // }

    public function wardEmployee()
    {
        return $this->hasOne(WardEmployee::class);
    }

    public function ward()
    {
        return $this->hasOneThrough(Ward::class, WardEmployee::class, 'employee_id', 'id', 'id', 'ward_id');
    }
}
