<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LiveController extends Controller
{
    public function index(){
        return view('live.index');
    }

    public function frontend(){
        return view('frontend.live.index', [
            'videos' => settings('live')
        ]);
    }
}
