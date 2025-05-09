<?php

namespace App\Http\Controllers;

use App\Models\OfficeBearer;
use App\Http\Requests\StoreOfficeBearerRequest;
use App\Http\Requests\UpdateOfficeBearerRequest;
use App\Models\OfficeBearerDesignation;
use Illuminate\Http\Request;

class OfficeBearerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OfficeBearer $officeBearer = null)
    {
        if (!$officeBearer) {
            $officeBearer = new OfficeBearer();
        }
        $officeBearers = OfficeBearer::with('election', 'member.officeDesignation', 'officeDesignation')
            ->positioned()
            ->paginate(50);
        $officeBearersDesignations = OfficeBearerDesignation::where('type', 'mun')->get();

        $wards = settings('wards');
        $wardNumbers = range(1, $wards);


        // return $officeBearers;

        return view('office-bearers.index', compact('officeBearer', 'officeBearers', 'officeBearersDesignations', 'wardNumbers'));
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
     * @param  \App\Http\Requests\StoreOfficeBearerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfficeBearerRequest $request)
    {

        OfficeBearer::create($request->validated());
        return redirect()
            ->back()
            ->with('success', 'पदाधिकारी सुरक्षित भयो');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeBearer  $officeBearer
     * @return \Illuminate\Http\Response
     */
    public function show(OfficeBearer $officeBearer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeBearer  $officeBearer
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficeBearer $officeBearer)
    {
        return $this->index($officeBearer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfficeBearerRequest  $request
     * @param  \App\Models\OfficeBearer  $officeBearer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfficeBearerRequest $request, OfficeBearer $officeBearer)
    {
        $officeBearer->update($request->validated());
        return redirect()
            ->route('office-bearers.index')
            ->with('success', 'पदाधिकारी सम्पादन भयो');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeBearer  $officeBearer
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeBearer $officeBearer)
    {
        $officeBearer->delete();
        return redirect()
            ->back()
            ->with('success', 'पदाधिकारी हटाइयो');
    }
    public function sort(Request $request)
    {
        $officeBearers = json_decode(json_encode($request->officeBearers));

        foreach ($officeBearers as $officeBearer) {
            OfficeBearer::whereId($officeBearer->id)->update(['position' => $officeBearer->position]);
        }
        return response()->json(['message' => 'officeBearer has been sorted'], 200);
    }

    public function frontendIndex()
    {
        $officeBearers = OfficeBearer::with('election', 'member')
            ->currentElection()
            ->current()
            ->positioned()
            ->paginate(50);
        return view('frontend.office-bearers.index', compact('officeBearers'));
    }

    public function frontendIndexOld()
    {
        $officeBearers = OfficeBearer::with('election', 'member')
            ->old()
            ->positioned()
            ->paginate(50);
        return view('frontend.office-bearers.old-index', compact('officeBearers'));
    }
}
