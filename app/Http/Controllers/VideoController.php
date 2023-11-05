<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        return view('video.index', [
            'videos' => Video::latest()->get()
        ]);
    }

    public function create()
    {
        return view('video.form', [
            'video' => new video,
            'updateMode' => false
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => ['required', 'regex:/^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/i']
        ]);

        $video = Video::create([
            'title' => $request->title,
            'url' => $request->url
        ]);

        return redirect()->route('videos.index');
    }

    public function edit(Video $video)
    {
        return view('video.form', [
            'video' => $video,
            'updateMode' => true
        ]);
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required',
            'url' => ['required', 'regex:/^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/i']
        ]);

        $video->update([
            'title' => $request->title,
            'url' => $request->url
        ]);

        return redirect()->route('videos.index');
    }

    public function destroy(Video $video)
    {
        //
    }
}
