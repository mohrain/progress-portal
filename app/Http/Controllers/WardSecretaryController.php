<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\User;
use App\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class WardSecretaryController extends Controller
{
    //
    public function wardSecratary(Ward $ward)
    {
        $secretary = $ward->secretary()->first();

        return view('ward.ward-secretary', compact('secretary', 'ward'));
    }
    public function StoreWardSecretary(Request $request, Ward $ward)
    {

        $request->validate([
            'employee_id' => 'required'
        ]);

        if ($request->email) {
            $useData = $request->validate([
                'email' => 'required|email',
                'password' => 'required|confirmed|min:8',
                'username' => 'required|unique:users,username',
            ]);
        }

        if ($request->email) {
            $employee = Employee::find($request->employee_id);
            $useData['name'] = $employee->name;
            $useData['password'] = Hash::make($request->password);


            $user = User::create($useData);
            $role = Role::firstOrCreate(['name' => 'ward-secretary']);
            $user->assignRole($role);
            if (!$employee->user_id) {
                $employee->update([
                    'user_id' => $user->id,
                    'email' => $user->email,
                ]);
            }
        }

        $ward->update([
            'secretary_id' => $request->employee_id
        ]);



        return redirect()->back()->with('success', 'वडा सचिव सफलतापूर्वक अपडेट गरिएको छ');
    }

    public function destroy(Ward $ward)
    {
        $employee = Employee::find($ward->secretary_id);



        if ($employee && $employee->user_id) {
            $user = User::query()->where('id', $employee->user_id)->first();

            if ($user) {
                $user->removeRole('ward-secretary');
                $user->roles()->count() == 0 ? $user->delete() : null;
            }
        }
        session()->forget('ward-secretary');

        $ward->update([
            'secretary_id' => null
        ]);


        return redirect()->back();
    }
}
