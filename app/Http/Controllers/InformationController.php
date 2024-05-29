<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
    public function store(Request $request){
        $data=$request->validate([
            'department_id'=>'required',
            'name'=>'required',
            'description'=>'required',
        ]);
        if($request->file('file')){
            $data['file']=$request->file('file')->store('file');
        }
        $information=Information::create($data);
        $department=Department::find($information->department_id);
        // return redirect()->back()->with('success',"");
        return redirect()->route('department.notices',$department->slug)->with('success',"नयाँ सूचना सफलतापुर्बक थपियो");
    }

    public function edit($slug,$id){
        $information=Information::find($id);

        $department=Department::where('slug',$slug)->first();
        $informations=Information::where('department_id',$department->id)->latest()->get();
        return view('deartments.backends.info',compact('department','informations','information'));
    }

    public function update($slug,$id,Request $request){
        $data=$request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);
        $information=Information::find($id);
        if($request->file('file')){
            if($information->file){
                Storage::delete($information->file);
            }
            $data['file']=$request->file('file')->store('file');
        }
        Information::find($id)->update($data);
        return redirect()->route('department.notices',$slug)->with('success',"सूचना सफलतापुर्बक परिबर्तन भयो");
    }

    public function delete($id){
        $information=Information::find($id);

        if($information->file){
            Storage::delete($information->file);
        }

        $information->delete();

        return redirect()->back()->with('success',"सूचना सफलतापुर्बक हटाइयो");
    }

    public function detail($slug,$id){
        $department=Department::where('slug',$slug)->first();
        $information=Information::find($id);
        $fileUrl='storage/'.$information->file;
        // return response()->file($fileUrl);
        return view('deartments.fronts.noticeDetail',compact('department','information'));
    }
}
