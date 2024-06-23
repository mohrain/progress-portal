<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Information;
use App\Models\OfficeBearer;
use Illuminate\Http\Request;
use App\Models\DepartmentAudio;
use App\Models\DepartmentVideo;
use App\Models\DepartmentActivity;
use App\Models\DepartmentPublication;
use App\Models\Federalparliment;
use App\User;
use Illuminate\Support\Facades\Hash;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('order', 'desc')->get();
        $federalparliment = Federalparliment::first();
        return view('deartments.fronts.index', compact('departments', 'federalparliment'));
    }

    public function list()
    {
        $departments = Department::with('employee')->latest()->where('status', 1)->get();
        return view('deartments.backends.list', compact('departments'));
    }

    public function create()
    {
        // $officeBeareds= Employee::latest()->get();
        return view('deartments.backends.index');
    }

    public function store(Request $request)
    {
        $department = Department::latest()->first();
        $order = 1;
        if ($department) {
            $order = $department->order + 1;
        }
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $data['order'] = $order;
        Department::create($data);

        return redirect()->route('department.list')->with('success', "New department have been stored");
    }
    public function edit($slug)
    {
        $department = Department::where('slug', $slug)->first();
        $officeBeareds = Employee::latest()->get();
        return view('deartments.backends.intro', compact('officeBeareds', 'department'));
    }

    public function update($id, Request $request)
    {
        $department = Department::find($id);
        $department->update($request->validate([
            'name' => 'required',
            'description' => 'required',
        ]));

        return redirect()->route('department.edit', $department->slug)->with('success', "Selected department have been updated");
    }

    public function duty($slug)
    {
        $department = Department::where('slug', $slug)->first();
        return view('deartments.backends.job', compact('department'));
    }

    public function workUpdate($id, Request $request)
    {
        $department = Department::find($id);
        $department->update($request->validate([
            'work' => 'required',
        ], [
            'work.required' => 'work,duty,authority field is required'
        ]));

        return redirect()->back()->with('success', "Work have been changed");
    }

    public function notices($slug)
    {
        $information = new Information();
        $department = Department::where('slug', $slug)->first();
        $informations = Information::where('department_id', $department->id)->latest()->get();
        return view('deartments.backends.info', compact('department', 'informations', 'information'));
    }

    public function noticesCreate($slug)
    {
        $information = new Information();
        $department = Department::where('slug', $slug)->first();
        return view('deartments.backends.infoCreate', compact('department', 'information'));
    }

    public function activity($slug)
    {
        $department = Department::where('slug', $slug)->first();
        $activity = new DepartmentActivity();
        $activities = DepartmentActivity::latest()->get();
        return view('deartments.backends.activity', compact('department', 'activity', 'activities'));
    }

    public function activityCreate($slug)
    {
        $department = Department::where('slug', $slug)->first();
        $activity = new DepartmentActivity();
        return view('deartments.backends.activityCreate', compact('department', 'activity'));
    }
    public function publications($slug)
    {
        $department = Department::where('slug', $slug)->first();
        $publication = new DepartmentPublication();
        $publications = DepartmentPublication::where('department_id', $department->id)->latest()->get();
        return view('deartments.backends.publication', compact('department', 'publications', 'publication'));
    }

    public function publicationsCreate($slug)
    {
        $department = Department::where('slug', $slug)->first();
        $publication = new DepartmentPublication();
        return view('deartments.backends.publicationCreate', compact('department', 'publication'));
    }

    public function publicationsedit ($slug,$id){
        $department = Department::where('slug', $slug)->first();
        $publication = DepartmentPublication::find($id);
        return view('deartments.backends.publicationCreate', compact('department', 'publication'));
    }

    public function publicationsupdate ($slug,$id){
        $publication = DepartmentPublication::find($id);
    }
    public function media($slug)
    {
        $department = Department::where('slug', $slug)->first();
        $audios = DepartmentAudio::where('department_id', $department->id)->latest()->get();
        $videos = DepartmentVideo::where('department_id', $department->id)->latest()->get();
        return view('deartments.backends.media', compact('department', 'audios', 'videos'));
    }

    public function video($slug)
    {
        $department = Department::where('slug', $slug)->first();
        $audios = DepartmentAudio::where('department_id', $department->id)->latest()->get();
        $videos = DepartmentVideo::where('department_id', $department->id)->latest()->get();
        return view('deartments.backends.video', compact('department', 'audios', 'videos'));
    }

    public function branch()
    {
        return view('deartments.backends.branch');
    }

    public function introFront($slug)
    {
        $department = Department::where('slug', $slug)->first();

        return view('deartments.fronts.intro', compact('department'));
    }

    public function workFront($slug)
    {
        $department = Department::where('slug', $slug)->first();

        return view('deartments.fronts.work', compact('department'));
    }

    public function noticeFront($slug, Request $request)
    {
        $department = Department::with('information')->where('slug', $slug)->first();

        $information = Information::where('department_id', $department->id)
            ->when($request->filled('start_date'), function ($query) {
                $query->where('created_at', '>=',  bs_to_ad(request('start_date')));
            })
            ->when($request->filled('end_date'), function ($query) {
                $query->where('created_at', '<=',  bs_to_ad(request('end_date')));
            })
            ->when($request->filled('keywords'), function ($query) {
                $query->where('name', 'like', '%' . (request('keywords')) . '%');
            });
        $informations = $information->get();

        // return $startDate = date($startDate);
        return view('deartments.fronts.notice', compact('department', 'informations'));
    }

    public function deleteDepartment($slug)
    {
        Department::where('slug', $slug)->first()->delete();

        return redirect()->back()->with('success', "Department have been removed");
    }

    public function hod($slug)
    {
        $department = Department::where('slug', $slug)->first();
        $officeBeareds = Employee::latest()->get();
        $hod = Employee::find($department->employee_id);
        return view("deartments.backends.hod", compact("department", 'officeBeareds', 'hod'));
    }

    public function hodStore(Request $request, $id)
    {
        $departmentData = $request->validate([
            'employee_id' => 'required'
        ]);
        if ($request->email) {
            $userData = $request->validate([
                'username' => 'required|unique:users,username',
                'email' => 'required|unique:users,email|email',
                'password' => 'required|confirmed'
            ]);
        }
        Department::find($id)->update($departmentData);
        $department = Department::find($id);
        if ($request->email) {
            $userData['name'] = Employee::find($department->employee_id)->name;
            $userData['password'] = Hash::make($request->password);

            $user = User::create($userData);
            $user->assignRole('hod');
            Employee::find($request->employee_id)->update([
                'user_id' => $user->id,
                'email' => $user->email
            ]);
        }

        return response()->json([
            'success' => true
        ]);
    }

    public function hodDestroy($slug, $id)
    {
        $hod = Employee::find($id);
        if ($hod->user_id) {
            User::find($hod->user_id)->delete();
            $hod->update([
                'user_id' => ''
            ]);
        }
        Department::where('slug', $slug)->first()->update([
            'employee_id' => null
        ]);
        return redirect()->back();
    }
}
