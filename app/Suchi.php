<?php

namespace App;

use App\Traits\Hashidable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suchi extends Model
{
    use HasFactory, Hashidable;

    const INITIAL_REG_NO = 1000;

    protected $guarded = ['id'];

    protected $appends = ['hash_id', 'full_reg_no'];

    protected static function booted()
    {
        // static::addGlobalScope('from_fiscal_year', function (Builder $builder) {
        // });
    }

    public function isRegistered()
    {
        return $this->reg_no ? true : false;
    }

    public function scopeApplicationOnly($query)
    {
        return $query->whereNull('reg_no');
    }

    public function scopeRegisteredOnly($query)
    {
        return $query->whereNotNull('reg_no');
    }

    public function scopeFromActiveFiscalYear($query)
    {
        return $query->where('fiscal_year_id', active_fiscal_year()->id);
    }

    public function getFullRegNoAttribute()
    {
        return $this->reg_no_prefix . '-' . $this->reg_no;
    }

    public function suchiType()
    {
        return $this->belongsTo(SuchiType::class);
    }

    public static function getNextRegno()
    {
        $regNoPrefix = running_fiscal_year()->name;
        return (Suchi::where('reg_no_prefix', $regNoPrefix)
            ->orderBy('reg_no', 'desc')
            ->first()->reg_no ?? Suchi::INITIAL_REG_NO) + 1;
    }

    public function registerNow()
    {
        $regNoPrefix = running_fiscal_year()->name;
        return $this->update([
            'fiscal_year_id' => running_fiscal_year()->id,
            'reg_no_prefix' => $regNoPrefix,
            'reg_no' => Suchi::getNextRegno(),
            'reg_date' => ad_to_bs(now()->format('Y-m-d')),
            'reg_date_ad' => now()->format('Y-m-d')
        ]);
    }
}
