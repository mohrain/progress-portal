<?php

namespace App\Http\Controllers;

use App\Models\OfficeBearerDesignation;
use Illuminate\Http\Request;

class OfficeBearerDesignationController extends Controller
{
    //

    public function index()
    {

        $designations = OfficeBearerDesignation::get();
        $designation = new OfficeBearerDesignation();

        // return $designations;

        return view('bearer-designation.index', compact('designations', 'designation'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
        ]);

        OfficeBearerDesignation::create($validated);

        return redirect()->route('bearer-designations.index')->with('success', 'पद सफलतापूर्वक थपियो');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {

        $designation = OfficeBearerDesignation::findBySlug($slug);

        return view('bearer-designation.index', [
            'designations' => OfficeBearerDesignation::get(),
            'designation' => $designation,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
        ]);

        $designation = OfficeBearerDesignation::findBySlug($slug);

        $designation->update($validated);

        return redirect()->route('bearer-designations.index')->with('success', 'पद सफलतापूर्वक सम्पादन गरियो');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $designation = OfficeBearerDesignation::findBySlug($slug);
        $designation->delete();

        return redirect()->route('bearer-designations.index')->with('success', 'पद हटाइयो');
    }
}
