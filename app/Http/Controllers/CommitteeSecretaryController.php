<?php

namespace App\Http\Controllers;

use App\Models\CommitteeSecretary;
use App\Http\Requests\StoreCommitteeSecretaryRequest;
use App\Http\Requests\UpdateCommitteeSecretaryRequest;
use App\Models\Committee;
use App\Models\CommitteeAudio;
use App\Models\Employee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class CommitteeSecretaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function secretary(Committee $committee)
    {
        $committeeSecretary = $committee
            ->committeeSecretary()
            ->with('employee')
            ->first();
        return view('committee.secretary', [
            'committee' => $committee,
            'committeeSecretary' => $committeeSecretary,
        ]);
    }
    public function audio(Committee $committee)
    {

        $audios = CommitteeAudio::where('committee_id', $committee->id)->get();
        return view('committee.audio', [
            'committee' => $committee,
            'audios' => $audios
        ]);
    }

    public function audioCreate(Committee $committee)
    {

        $audio = new CommitteeAudio();
        return view('committee.audio-form', [
            'committee' => $committee,
            'committeeAudio' => $audio,
        ]);
    }
    public function audioStore(Request $request, Committee $committee)
    {
        $data = $request->validate([
            'name' => 'required',
            'audio' => 'required',
        ]);

        if ($request->file('audio')) {
            $data['audio'] = $request->file('audio')->store('audio');
        }
        $data['committee_id'] = $committee->id;
        CommitteeAudio::create($data);
        return redirect()->route('committee.audio', $committee);
    }
    public function audioEdit(Committee $committee, CommitteeAudio $audio)
    {

        return view('committee.audio-form', [
            'committee' => $committee,
            'committeeAudio' => $audio,
        ]);
    }

    public function audioUpdate(Request $request, Committee $committee, CommitteeAudio $audio)
    {

        $data = $request->validate([
            'name' => 'required',
            'audio' => 'nullable',
        ]);

        if ($request->file('audio')) {
            if ($audio->audio) {
                Storage::delete($audio->audio);
            }
            $data['audio'] = $request->file('audio')->store('audio');
        }
        $audio->update($data);

        return redirect()->route('committee.audio', $committee);
    }
    public function audioDelete(CommitteeAudio $audio)
    {
        if ($audio->audio) {
            Storage::delete($audio->audio);
        }
        $audio->delete();

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommitteeSecretaryRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreCommitteeSecretaryRequest $request, Committee $committee)
    // {
    //     $committee->committeeSecretary()->create($request->validated());
    //     return redirect()->back();
    // }

    public function store(Request $request, Committee $committee)
    {
        $empData = $request->validate([
            'employee_id' => 'required'

        ]);
        if ($request->email) {
            $useData = $request->validate([
                'email' => 'required|email',
                'password' => 'required|confirmed|min:8',
                'username' => 'required|unique:users,username',
            ]);
        }
        // return ""
        $committee->committeeSecretary()->create($empData);
        if ($request->email) {
            $employee = Employee::find($request->employee_id);
            $useData['name'] = $employee->name;
            $useData['password'] = Hash::make($request->password);


            $user = User::create($useData);
            $role = Role::firstOrCreate(['name' => 'sachib']);
            $user->assignRole($role);
            $employee->update([
                'user_id' => $user->id,
                'email' => $user->email,
            ]);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommitteeSecretary  $committeeSecretary
     * @return \Illuminate\Http\Response
     */
    public function show(CommitteeSecretary $committeeSecretary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommitteeSecretary  $committeeSecretary
     * @return \Illuminate\Http\Response
     */
    public function edit(CommitteeSecretary $committeeSecretary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommitteeSecretaryRequest  $request
     * @param  \App\Models\CommitteeSecretary  $committeeSecretary
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommitteeSecretaryRequest $request, CommitteeSecretary $committeeSecretary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommitteeSecretary  $committeeSecretary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Committee $committee, CommitteeSecretary $committeeSecretary)
    {
        $employee = Employee::find($committeeSecretary->employee_id);


        if ($employee && $employee->user_id) {
            User::query()->where('id', $employee->user_id)->delete();
            $employee->update([
                'user_id' => null
            ]);
        }

        $data = $committeeSecretary->delete();

        return redirect()->back();
    }
}
