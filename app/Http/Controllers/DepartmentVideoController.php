<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DepartmentVideoController extends Controller
{
    public function store(Request $request, $slug)
    {
        $data = $request->validate([
            'department_id' => 'required',
            'name' => 'required',
            'url' => 'required',
            'thumbnail' => 'required',
        ]);
        if ($request->file('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        }
        DepartmentVideo::create($data);

        return redirect()->route('department.video', $slug)->with('success', "नयाँ भिडिओ सफलतापुर्बक थपियो");
    }

    public function delete($slug, $id)
    {
        $video = DepartmentVideo::find($id);

        if ($video->thumbnail) {
            Storage::delete($video->thumbnail);
        }

        $video->delete();

        return redirect()->back()->with('success', "भिडिओ सफलतापुर्बक हटाइयो");
    }

    public function videoFront($slug)
    {
        $department = Department::with('video')->where('slug', $slug)->first();
        $departments = Department::where('department_id', $department->id)->get();
        return view('deartments.fronts.video', compact('department', 'departments'));
    }
}
