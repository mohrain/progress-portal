<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\DepartmentAudio;
use Illuminate\Support\Facades\Storage;

class DepartmentAudioController extends Controller
{
    public function store(Request $request, $slug)
    {
        $data = $request->validate([
            'department_id' => 'required',
            'name' => 'required',
            'audio' => 'required',
        ]);

        if ($request->file('audio')) {
            $data['audio'] = $request->file('audio')->store('audio');
        }

        DepartmentAudio::create($data);

        return redirect()->route('department.media', $slug)->with('success', "नयाँ अडियो सफलतापुर्बक थपियो");
    }

    public function delete($slug, $id)
    {
        $audio = DepartmentAudio::find($id);

        if ($audio->audio) {
            Storage::delete($audio->audio);
        }

        $audio->delete();

        return redirect()->back()->with('success', "अडियो सफलतापुर्बक हटाइयो");
    }

    public function audioFront($sllug)
    {
        $department = Department::with('audio')->where('slug', $sllug)->first();
        $departments = Department::where('department_id', $department->id)->get();

        return view('deartments.fronts.audio', compact('department', 'departments'));
    }
}
