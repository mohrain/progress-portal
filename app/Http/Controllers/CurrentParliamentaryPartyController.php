<?php

namespace App\Http\Controllers;

use App\Models\CurrentParliamentaryParty;
use App\Http\Requests\StoreCurrentParliamentaryPartyRequest;
use App\Http\Requests\UpdateCurrentParliamentaryPartyRequest;
use Illuminate\Http\Request;

class CurrentParliamentaryPartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CurrentParliamentaryParty $currentParliamentaryParty = null)
    {
        if (!$currentParliamentaryParty) {
            $currentParliamentaryParty = new CurrentParliamentaryParty();
        }
        $currentParliamentaryParties = CurrentParliamentaryParty::with('parliamentaryParty')
            ->positioned()
            ->get();
        return view('current-parliamentery-parties.index', compact('currentParliamentaryParties', 'currentParliamentaryParty'));
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
     * @param  \App\Http\Requests\StoreCurrentParliamentaryPartyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCurrentParliamentaryPartyRequest $request)
    {
        CurrentParliamentaryParty::create($request->validated());
        return redirect()
            ->back()
            ->with('success', 'Parliamentary Party Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CurrentParliamentaryParty  $currentParliamentaryParty
     * @return \Illuminate\Http\Response
     */
    public function show(CurrentParliamentaryParty $currentParliamentaryParty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CurrentParliamentaryParty  $currentParliamentaryParty
     * @return \Illuminate\Http\Response
     */
    public function edit(CurrentParliamentaryParty $currentParliamentaryParty)
    {
        return $this->index($currentParliamentaryParty);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCurrentParliamentaryPartyRequest  $request
     * @param  \App\Models\CurrentParliamentaryParty  $currentParliamentaryParty
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCurrentParliamentaryPartyRequest $request, CurrentParliamentaryParty $currentParliamentaryParty)
    {
        $currentParliamentaryParty->update($request->validated());
        return redirect()
            ->route('current-parliamentary-parties.index')
            ->with('success', 'parliamentary party Deleted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CurrentParliamentaryParty  $currentParliamentaryParty
     * @return \Illuminate\Http\Response
     */
    public function destroy(CurrentParliamentaryParty $currentParliamentaryParty)
    {
        $currentParliamentaryParty->delete();
        return redirect()
            ->back()
            ->with('success', 'parliamentary party Deleted');
    }
    public function sort(Request $request)
    {
        $currentParliamentaryParties = json_decode(json_encode($request->currentParliamentaryParties));

        foreach ($currentParliamentaryParties as $currentParliamentaryParty) {
            CurrentParliamentaryParty::whereId($currentParliamentaryParty->id)->update(['position' => $currentParliamentaryParty->position]);
        }

        return response()->json(['message' => 'parliamentary party has been sorted'], 200);
    }

    public function frontendIndex()
    {
        $currentParliamentaryParties = CurrentParliamentaryParty::with('parliamentaryParty')
            ->positioned()
            ->get();
        return view('frontend.current-parliamentery-parties.index', compact('currentParliamentaryParties'));
    }
}
