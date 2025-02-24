<?php

namespace App\Http\Controllers;

use App\User;
use App\District;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Information;
use App\Models\OfficeBearer;
use Illuminate\Http\Request;
use App\Models\DepartmentAudio;
use App\Models\DepartmentVideo;
use App\Models\Federalparliment;
use App\Models\DepartmentActivity;
use Illuminate\Support\Facades\Hash;
use App\Models\DepartmentPublication;
use Spatie\Permission\Models\Role;

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
        $departments = Department::with('employee', 'department')
        ->latest()
        ->where('status', 1)
        ->get()
        ->map(function ($department) {
            $department->department_id = $department->department_id ?? 'parent'; // Replace null with "Unknown"
            return $department;
        })
        ->groupBy('department_id');

        return view('deartments.backends.list', compact('departments'));
    }

    public function create()
    {
        // $officeBeareds= Employee::latest()->get();
        $departments = Department::where('status', 1)->get();
        return view('deartments.backends.index', compact('departments'));
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
            'department_id' => 'nullable',
            'status' => 'required',
        ]);
        $data['order'] = $order;
        Department::create($data);

        return redirect()->route('department.list')->with('success', "New department have been stored");
    }
    public function edit($slug)
    {
        $department = Department::with('department')->where('slug', $slug)->first();
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
        $departments = Department::get();
        return view('deartments.backends.job', compact('department', 'departments'));
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
        $departments = Department::where('department_id', $department->id)->get();

        $activity = new DepartmentActivity();
        $activities = DepartmentActivity::latest()->get();
        return view('deartments.backends.activity', compact('department', 'activity', 'activities', 'departments'));
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
        $departments = Department::where('department_id', $department->id)->get();

        $publication = new DepartmentPublication();
        $publications = DepartmentPublication::where('department_id', $department->id)->latest()->get();
        return view('deartments.backends.publication', compact('department', 'publications', 'publication', 'departments'));
    }

    public function publicationsCreate($slug)
    {
        $department = Department::where('slug', $slug)->first();
        $publication = new DepartmentPublication();
        return view('deartments.backends.publicationCreate', compact('department', 'publication'));
    }

    public function publicationsedit($slug, $id)
    {
        $department = Department::where('slug', $slug)->first();
        $publication = DepartmentPublication::find($id);
        return view('deartments.backends.publicationCreate', compact('department', 'publication'));
    }

    public function publicationsupdate($slug, $id)
    {
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
        $departments = Department::where('department_id', $department->id)->get();

        return view('deartments.fronts.intro', compact('department', 'departments'));
    }

    public function workFront($slug)
    {
        $department = Department::where('slug', $slug)->first();
        $departments = Department::where('department_id', $department->id)->get();

        return view('deartments.fronts.work', compact('department', 'departments'));
    }

    public function noticeFront($slug, Request $request)
    {


        $department = Department::with('information')->where('slug', $slug)->first();

        $departments = Department::where('department_id', $department->id)->get();

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
        return view('deartments.fronts.notice', compact('department', 'informations', 'departments'));
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

        $emp= Employee::find($request->employee_id);
        if ($request->email) {
            $userData = $request->validate([
                'username' => 'required|unique:users,username',
                'email' => 'required|unique:users,email|email',
                'password' => 'required|confirmed'
            ]);
        }
        $department = Department::find($id);
        $department->update($departmentData);
        $role = Role::firstOrCreate(['name' => 'hod']);
        if ($request->email) {
            $userData['name'] = Employee::find($department->employee_id)->name;
            $userData['password'] = Hash::make($request->password);

            $user = User::create($userData);
           
            $user->assignRole($role);
            $emp->update([
                'user_id' => $user->id,
                'email' => $user->email
            ]);
        }else{
            $user= User::find($emp->user_id);
            $user->assignRole($role);
        }

        return response()->json([
            'success' => true
        ]);
    }

    public function hodDestroy($slug, $id)
    {
        $hod = Employee::find($id);
        $department = Department::where('slug', $slug)->first();
       $count = $hod->departments->count();
       $user= User::find($hod->user_id);

       
       if ($hod && $hod->user_id) {
           if($count==1){
                if ($user->hasRole('hod')) {
                          
                    $user->removeRole('hod');
                }

               if(!$hod->committeeSecretary){
                    $user->delete();
                     $hod->update([
                   'user_id' => ''
                     ]);
             }
           }
        }
        $department->update([
            'employee_id' => null
        ]);

        session()->forget('current_department');

        return redirect()->back();
    }

    public function subdepartment($departmentSlug)
    {
        $department = Department::where('slug', $departmentSlug)->first();
        $departments = Department::where('department_id', $department->id)->latest()->get();
        return view('deartments.backends.subdepartment.index', compact('departments'));
    }

    public function allStaffs(Request $request)
    {
        $employees = Employee::where('status', 1);

        if ($request->name) {
            $employees = $employees->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->name_english) {
            $employees = $employees->where('name_english', 'like', '%' . $request->name_english . '%');
        }
        if ($request->branch) {
            $employees = $employees->where('branch', 'like', '%' . $request->branch . '%');
        }
        if ($request->designation) {
            $employees = $employees->where('designation', 'like', '%' . $request->designation . '%');
        }
        if ($request->permanent_address_district) {
            $employees = $employees->where('permanent_address_district', $request->permanent_address_district);
        }
        if ($request->gender) {
            $employees = $employees->where('gender', $request->gender);
        }

        // Order by position before paginating
        $employees = $employees->positioned()->paginate(50);


        $districts = District::latest()->get();

        return view('deartments.fronts.staff', compact('employees', 'districts'));
    }

    public function switchDepartment(Department $department){
        session(['current_department' => $department->id]);

        // Redirect to the desired route (you can customize the redirect)
        return redirect()->back();
    }
}
