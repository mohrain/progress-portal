<?php

namespace App\Http\Controllers;

use App\Models\InformationOfficer;
use App\Http\Requests\StoreInformationOfficerRequest;
use App\Http\Requests\UpdateInformationOfficerRequest;
use Illuminate\Http\Request;

class InformationOfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InformationOfficer $informationOfficer = null)
    {
        if (!$informationOfficer) {
            $informationOfficer = new InformationOfficer();
        }
        $informationOfficers = InformationOfficer::with(['employeeDesignation', 'employee'])
            ->positioned()
            ->get();
        return view('information-officers.index', compact('informationOfficer', 'informationOfficers'));
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
     * @param  \App\Http\Requests\StoreInformationOfficerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInformationOfficerRequest $request)
    {
        InformationOfficer::create($request->validated());
        return redirect()
            ->route('information-officers.index')
            ->with('success', 'Information Officers Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InformationOfficer  $informationOfficer
     * @return \Illuminate\Http\Response
     */
    public function show(InformationOfficer $informationOfficer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InformationOfficer  $informationOfficer
     * @return \Illuminate\Http\Response
     */
    public function edit(InformationOfficer $informationOfficer)
    {
        return $this->index($informationOfficer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInformationOfficerRequest  $request
     * @param  \App\Models\InformationOfficer  $informationOfficer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInformationOfficerRequest $request, InformationOfficer $informationOfficer)
    {
        $informationOfficer->update($request->validated());
        return redirect()
            ->route('information-officers.index')
            ->with('success', 'Information Officer Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InformationOfficer  $informationOfficer
     * @return \Illuminate\Http\Response
     */
    public function destroy(InformationOfficer $informationOfficer)
    {
        $informationOfficer->delete();
        return redirect()
            ->route('information-officers.index')
            ->with('success', 'Information Officer Deleted');
    }

    public function sort(Request $request)
    {
        $informationOfficers = json_decode(json_encode($request->informationOfficers));

        foreach ($informationOfficers as $informationOfficer) {
            InformationOfficer::whereId($informationOfficer->id)->update(['position' => $informationOfficer->position]);
        }

        return response()->json(['message' => 'informationOfficer has been sorted'], 200);
    }
}
