<?php

namespace App\Http\Controllers;

use App\SuchiType;
use Illuminate\Http\Request;

class SuchiTypeController extends Controller
{
    public function index($suchiType = null)
    {
        $suchiTypes = SuchiType::get();

        if (!$suchiType) {
            $suchiType = new SuchiType();
        }

        return view('suchi-type.index', compact(['suchiType', 'suchiTypes']));
    }

    public function store(Request $request)
    {
        SuchiType::create($request->validate([
            'title' => 'required',
        ]));

        return back()->with('success', 'Suchi Type added');
    }

    public function edit(SuchiType $suchiType)
    {
        return $this->index($suchiType);
    }

    public function update(Request $request, SuchiType $suchiType)
    {
        $suchiType->update($request->validate([
            'title' => 'required',
        ]));

        return back()->with('success', 'Suchi type updated.');
    }

    public function destroy(SuchiType  $suchiType)
    {
        if ($suchiType->projects()->count()) {
            return redirect()->route('suchi-types.index')->with('error', 'Sorry you cannot delete this suchi type.');
        }

        $suchiType->delete();

        return redirect()->route('suchi-types.index')->with('success', 'Suchi type deleted successfully.');
    }
}
