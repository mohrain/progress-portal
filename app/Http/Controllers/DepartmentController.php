<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Information;
use App\Models\OfficeBearer;
use Illuminate\Http\Request;
use App\Models\DepartmentAudio;
use App\Models\DepartmentActivity;
use App\Models\DepartmentPublication;
use App\Models\DepartmentVideo;

class DepartmentController extends Controller
{
    public function index(){
        $departments=Department::orderBy('order','desc')->get();
        return view('deartments.fronts.index',compact('departments'));
    }

    public function list(){
        $departments=Department::with('employee')->latest()->where('status',1)->get();
        return view('deartments.backends.list',compact('departments'));
    }

    public function create(){
        $officeBeareds= Employee::latest()->get();
        return view('deartments.backends.index',compact('officeBeareds'));
    }

    public function store(Request $request){
        $department=Department::latest()->first();
        $order=1;
        if($department){
            $order=$department->order+1;
        }
        $data=$request->validate([
            'name'=>'required',
            'employee_id'=>'required',
            'description'=>'required',
        ]);
        $data['order']=$order;
        Department::create($data);

        return redirect()->route('department.list')->with('success',"New department have been stored");
    }
    public function edit($slug){
        $department=Department::where('slug',$slug)->first();
        $officeBeareds= Employee::latest()->get();
        return view('deartments.backends.intro',compact('officeBeareds','department'));
    }

    public function update($id,Request $request){
        $department=Department::find($id);
        $department->update($request->validate([
            'name'=>'required',
            'employee_id'=>'required',
            'description'=>'required',
        ]));

        return redirect()->route('department.edit',$department->slug)->with('success',"Selected department have been updated");
    }

    public function duty($slug){
        $department=Department::where('slug',$slug)->first();
        return view('deartments.backends.job',compact('department'));
    }

    public function workUpdate($id,Request $request){
        $department=Department::find($id);
        $department->update($request->validate([
            'work'=>'required',
        ],[
            'work.required'=>'work,duty,authority field is required'
        ]));

        return redirect()->back()->with('success',"Work have been changed");
    }

    public function notices($slug){
       $information=new Information();
        $department=Department::where('slug',$slug)->first();
        $informations=Information::where('department_id',$department->id)->latest()->get();
        return view('deartments.backends.info',compact('department','informations','information'));
    }

    public function noticesCreate($slug){
        $information=new Information();
        $department=Department::where('slug',$slug)->first();
        return view('deartments.backends.infoCreate',compact('department','information'));
    }

    public function activity($slug){
        $department=Department::where('slug',$slug)->first();
        $activity=new DepartmentActivity();
        $activities=DepartmentActivity::latest()->get();
        return view('deartments.backends.activity',compact('department','activity','activities'));
    }

    public function activityCreate($slug){
        $department=Department::where('slug',$slug)->first();
        $activity=new DepartmentActivity();
        return view('deartments.backends.activityCreate',compact('department','activity'));
    }
    public function publications($slug){
        $department=Department::where('slug',$slug)->first();
        $publication=new DepartmentPublication();
        $publications=DepartmentPublication::where('department_id',$department->id)->latest()->get();
        return view('deartments.backends.publication',compact('department','publications','publication'));
    }

    public function publicationsCreate($slug){
        $department=Department::where('slug',$slug)->first();
        $publication=new DepartmentPublication();
        return view('deartments.backends.publicationCreate',compact('department','publication'));
    }
    public function media($slug){
        $department=Department::where('slug',$slug)->first();
        $audios=DepartmentAudio::where('department_id',$department->id)->latest()->get();
        $videos=DepartmentVideo::where('department_id',$department->id)->latest()->get();
        return view('deartments.backends.media',compact('department','audios','videos'));
    }

    public function video($slug){
        $department=Department::where('slug',$slug)->first();
        $audios=DepartmentAudio::where('department_id',$department->id)->latest()->get();
        $videos=DepartmentVideo::where('department_id',$department->id)->latest()->get();
        return view('deartments.backends.video',compact('department','audios','videos'));
    }

    public function branch(){
        return view('deartments.backends.branch');
    }

    public function introFront($slug){
       $department=Department::where('slug',$slug)->first();

        return view('deartments.fronts.intro',compact('department'));
    }

    public function workFront($slug){
        $department=Department::where('slug',$slug)->first();

        return view('deartments.fronts.work',compact('department'));
    }

    public function noticeFront($slug){
        $department=Department::with('information')->where('slug',$slug)->first();

        return view('deartments.fronts.notice',compact('department'));
    }

    public function deleteDepartment($slug){
        Department::where('slug',$slug)->first()->delete();

        return redirect()->back()->with('success',"Department have been removed");
    }
}
