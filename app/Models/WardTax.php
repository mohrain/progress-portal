<?php

namespace App\Models;

use App\Ward;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WardTax extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function taxTitle()
    {
        return $this->belongsTo(TaxTitle::class, 'tax_title_id');
    }
    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }
}
