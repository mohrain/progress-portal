<?php

namespace App\Http\Controllers;

use App\ParliamentaryParty;
use App\Http\Requests\StoreParliamentaryPartyRequest;
use App\Http\Requests\UpdateParliamentaryPartyRequest;
use Illuminate\Http\Request;

class ParliamentaryPartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ParliamentaryParty $parliamentaryParty = null)
    {
        if (!$parliamentaryParty) {
            $parliamentaryParty = new ParliamentaryParty();
        }
        $parliamentaryPartys = ParliamentaryParty::positioned()->get();
        return view('parliamentery-parties.index', compact('parliamentaryParty', 'parliamentaryPartys'));
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
     * @param  \App\Http\Requests\StoreParliamentaryPartyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParliamentaryPartyRequest $request)
    {
        ParliamentaryParty::create($request->validated());
        return redirect()
            ->back()
            ->with('success', 'Parliamentary Party Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ParliamentaryParty  $parliamentaryParty
     * @return \Illuminate\Http\Response
     */
    public function show(ParliamentaryParty $parliamentaryParty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ParliamentaryParty  $parliamentaryParty
     * @return \Illuminate\Http\Response
     */
    public function edit(ParliamentaryParty $parliamentaryParty)
    {
        return $this->index($parliamentaryParty);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParliamentaryPartyRequest  $request
     * @param  \App\ParliamentaryParty  $parliamentaryParty
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParliamentaryPartyRequest $request, ParliamentaryParty $parliamentaryParty)
    {
        $parliamentaryParty->update($request->validated());
        return redirect()
            ->route('parliamentary-parties.index')
            ->with('success', 'Parliamentary Party Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ParliamentaryParty  $parliamentaryParty
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParliamentaryParty $parliamentaryParty)
    {
        $parliamentaryParty->delete();
        return redirect()
            ->back()
            ->with('success', 'Parliamentary Party Deleted');
    }

    public function sort(Request $request)
    {
        $parliamentaryPartys = json_decode(json_encode($request->parliamentaryPartys));

        foreach ($parliamentaryPartys as $parliamentaryParty) {
            ParliamentaryParty::whereId($parliamentaryParty->id)->update(['position' => $parliamentaryParty->position]);
        }

        return response()->json(['message' => 'Parliamentary Party has been sorted'], 200);
    }
}
