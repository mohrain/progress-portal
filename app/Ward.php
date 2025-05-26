<?php

namespace App;

use App\Models\Download;
use App\Models\Employee;
use App\Models\WardApplication;
use App\Models\WardAudio;
use App\Models\WardEmployee;
use App\Models\WardRecomendation;
use App\Models\WardTax;
use App\Models\WardVideo;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $guarded = [];

    public function organizations()
    {
        return $this->hasMany('App\Organization', 'org_ward_id');
    }

    /**
     * Get the users of this ward
     *
     * @return void
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function secretary()
    {
        return $this->belongsTo(Employee::class, 'secretary_id');
    }

    public function downloads()
    {
        return $this->morphMany(Download::class, 'downloadable')->latest();
    }

    public function audios()
    {
        return $this->hasMany(WardAudio::class);
    }
    public function videos()
    {
        return $this->hasMany(WardVideo::class);
    }

    // ward employees
    public function wardEmployees()
    {
        return $this->hasMany(WardEmployee::class);
    }

    public function employees()
    {
        return $this->hasManyThrough(Employee::class, WardEmployee::class, 'ward_id', 'id', 'id', 'employee_id');
    }
    public function wardApplications()
    {
        return $this->hasMany(WardApplication::class);
    }
    public function wardTaxes()
    {
        return $this->hasMany(WardTax::class);
    }
    public function wardRecomendations()
    {
        return $this->hasMany(WardRecomendation::class);
    }
}
