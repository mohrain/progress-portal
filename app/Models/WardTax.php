<?php

namespace App\Models;

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
}
