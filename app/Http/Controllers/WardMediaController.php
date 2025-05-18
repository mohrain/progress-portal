<?php

namespace App\Http\Controllers;

use App\Models\WardAudio;
use App\Models\WardVideo;
use App\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WardMediaController extends Controller
{
    //
    public function audio(Ward $ward)
    {
        $audios = WardAudio::where('ward_id', $ward->id)->get();

        return view('ward.audio', [
            'ward' => $ward,
            'audios' => $audios,
        ]);
    }

    public function audioCreate(Ward $ward)
    {
        $audio = new WardAudio();

        return view('ward.audio-form', [
            'ward' => $ward,
            'wardAudio' => $audio,
        ]);
    }

    public function audioStore(Request $request, Ward $ward)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'audio' => 'required|file|mimes:mp3,wav,ogg',
        ]);

        if ($request->file('audio')) {
            $data['audio'] = $request->file('audio')->store('audio');
        }

        $data['ward_id'] = $ward->id;

        WardAudio::create($data);

        return redirect()->route('ward.audio', $ward);
    }

    public function audioEdit(Ward $ward, WardAudio $audio)
    {
        return view('ward.audio-form', [
            'ward' => $ward,
            'wardAudio' => $audio,
        ]);
    }

    public function audioUpdate(Request $request, Ward $ward, WardAudio $audio)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'audio' => 'nullable|file|mimes:mp3,wav,ogg',
        ]);

        if ($request->file('audio')) {
            if ($audio->audio) {
                Storage::delete($audio->audio);
            }
            $data['audio'] = $request->file('audio')->store('audio');
        }

        $audio->update($data);

        return redirect()->route('ward.audio', $ward);
    }

    public function audioDelete(WardAudio $audio)
    {
        if ($audio->audio) {
            Storage::delete($audio->audio);
        }

        $audio->delete();

        return redirect()->back();
    }

    public function index(Ward $ward)
    {
        $videos = WardVideo::where('ward_id', $ward->id)->get();
        return view('ward.video', [
            'ward' => $ward,
            'videos' => $videos,
        ]);
    }

    public function videoCreate(Ward $ward)
    {
        $video = new WardVideo();
        return view('ward.video-form', [
            'ward' => $ward,
            'wardVideo' => $video,
        ]);
    }

    public function videoStore(Request $request, Ward $ward)
    {
        $data = $request->validate([
            'name' => 'required',
            'url' => 'required',
            'thumbnail' => 'required',
        ]);

        if ($request->file('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnail');
        }

        $data['ward_id'] = $ward->id;
        WardVideo::create($data);

        return redirect()->route('ward.video', $ward);
    }

    public function videoEdit(Ward $ward, WardVideo $video)
    {
        return view('ward.video-form', [
            'ward' => $ward,
            'wardVideo' => $video,
        ]);
    }

    public function videoUpdate(Request $request, Ward $ward, WardVideo $video)
    {
        $data = $request->validate([
            'name' => 'required',
            'url' => 'required',
            'thumbnail' => 'nullable',
        ]);

        if ($request->file('thumbnail')) {
            if ($video->thumbnail) {
                Storage::delete($video->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnail');
        }

        $video->update($data);

        return redirect()->route('ward.video', $ward);
    }

    public function videoDelete(WardVideo $video)
    {
        if ($video->thumbnail) {
            Storage::delete($video->thumbnail);
        }
        $video->delete();

        return redirect()->back();
    }
}
