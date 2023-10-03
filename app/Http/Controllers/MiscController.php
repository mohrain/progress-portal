<?php

namespace App\Http\Controllers;

use App\FiscalYear;
use Illuminate\Http\Request;

class MiscController extends Controller
{
    public function setActiveFiscalYear(FiscalYear $fiscalYear)
    {
        session()->put('active_fiscal_year', $fiscalYear);
        return back();
    }
}
