<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    public function index()
    {
        return view('frontend.video.index', [
            'videos' => Video::latest()->get()
        ]);
    }
}
