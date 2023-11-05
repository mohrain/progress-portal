<?php

namespace App\Http\Controllers;

use App\Models\CommitteeSecretary;
use App\Http\Requests\StoreCommitteeSecretaryRequest;
use App\Http\Requests\UpdateCommitteeSecretaryRequest;
use App\Models\Committee;

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
    public function store(StoreCommitteeSecretaryRequest $request, Committee $committee)
    {
        $committee->committeeSecretary()->create($request->validated());
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
        $committeeSecretary->delete();
        return redirect()->back();
    }
}
