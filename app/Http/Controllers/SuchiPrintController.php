<?php

namespace App\Http\Controllers;

use App\Suchi;
use Illuminate\Http\Request;

class SuchiPrintController extends Controller
{
    public function index(Suchi $suchi)
    {
        return view('suchi.print', compact('suchi'));
    }

    public function certificate(Suchi $suchi)
    {
        return view('suchi.certificate', compact('suchi'));
    }
}
