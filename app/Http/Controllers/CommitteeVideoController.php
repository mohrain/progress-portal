<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\CommitteeVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommitteeVideoController extends Controller
{
    public function index(Committee $committee){
        $videos=CommitteeVideo::where('committee_id', $committee->id)->get();
        return view('committee.video', [
            'committee' => $committee,
            'videos'=>$videos
        ]);
    }

    public function videoCreate(Committee $committee){

        $video=new CommitteeVideo();
        return view('committee.video-form', [
            'committee' => $committee,
            'committeeVideo' => $video,
        ]);
    }

    public function videoStore(Request $request, Committee $committee){
        $data=$request->validate([
            'name'=>'required',
            'url'=>'required',
            'thumbnail'=>'required',
        ]);

        if($request->file('thumbnail')){
            $data['thumbnail']=$request->file('thumbnail')->store('thumbnail');
        }
        $data['committee_id']=$committee->id;
        CommitteeVideo::create($data);
        return redirect()->route('committee.video.index',$committee);
    }

    public function videoEdit(Committee $committee,CommitteeVideo $video){

        return view('committee.video-form', [
            'committee' => $committee,
            'committeeVideo' => $video,
        ]);
    }

    public function videoUpdate(Request $request,Committee $committee,CommitteeVideo $video){

        $data=$request->validate([
            'name'=>'required',
            'url'=>'required',
            'thumbnail'=>'nullable',
        ]);

        if($request->file('thumbnail')){
            if($video->thumbnail){
                Storage::delete($video->thumbnail);
            }
            $data['audio']=$request->file('thumbnail')->store('thumbnail');
        }
        $video->update($data);

        return redirect()->route('committee.video.index',$committee);
    }

    public function videoDelete(CommitteeVideo $video){
        if($video->thumbnail){
            Storage::delete($video->thumbnail);
        }
        $video->delete();

        return redirect()->back();
    }
}
