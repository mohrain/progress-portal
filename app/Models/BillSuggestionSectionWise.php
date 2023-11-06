<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillSuggestionSectionWise extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function billSuggestion()
    {
        return $this->belongsTo(BillSuggestion::class);
    }
}
