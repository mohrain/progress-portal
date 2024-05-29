<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\DepartmentActivity;
use Illuminate\Support\Facades\Storage;

class DepartmentActivityController extends Controller
{
    public function store(Request $request)
    {
        $data=$request->validate([
            'department_id' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        if($request->file('file')){
            $data['file']=$request->file('file')->store('file');
        }
        $activity=DepartmentActivity::create($data);
        $department=Department::find($activity->department_id);
        // return redirect()->back()->with('success', "");
        return redirect()->route('department.activity', $department->slug)->with('success', 'नया गतिबिधि सफलतापुर्बक थपियो');
    }

    public function edit(Request $request, $slug, $id)
    {
        $department = Department::where('slug', $slug)->first();
        $activity = new DepartmentActivity();
        $activities = DepartmentActivity::latest()->get();
        $activity = DepartmentActivity::find($id);
        return view('deartments.backends.activity', compact('department', 'activity', 'activities', 'activity'));
    }

    public function update(Request $request, $slug, $id)
    {
        $data=$request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $department=Department::find($id);

        if($request->file('department')){
            if($department->file){
                Storage::delete($department->file);
            }
            $data['file']=$request->file('file')->store('file');
        }
        $department->update($data);

        return redirect()->route('department.activity', $slug)->with('success', 'गतिबिधि सफलतापुर्बक परिबर्तन भयो');
    }

    public function delete($id)
    {
        $department=DepartmentActivity::find($id);
        if($department->file){
            Storage::delete($department->file);
        }

        $department->delete();
        return redirect()->back()->with('success', "गतिबिधि सफलतापुर्बक हटाइयो");
    }
    public function activiityFront($slug)
    {
        $department = Department::with('activity')->where('slug', $slug)->first();
        return view('deartments.fronts.activity', compact('department'));
    }

    public function detail($slug,$id){
        $department=Department::where('slug',$slug)->first();
        $activity=DepartmentActivity::find($id);
        $fileUrl='storage/'.$activity->file;
        // return response()->file($fileUrl);
        return view('deartments.fronts.activityDetail',compact('activity','department'));
    }
}
