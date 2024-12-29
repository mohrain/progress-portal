<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageDisplayController extends Controller
{
    //


    public function pradeshShava()
    {
        return view('frontend.mobile.pradesh-shava');
    }


    public function Members()
    {
        return view('frontend.mobile.members');
    }
    public function Samiti()
    {
        return view('frontend.mobile.samiti');
    }
}
