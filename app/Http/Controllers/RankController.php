<?php

namespace App\Http\Controllers;

use App\Models\Rank;
use App\Http\Requests\StoreRankRequest;
use App\Http\Requests\UpdateRankRequest;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('ranks.index', [
            'ranks' => Rank::latest()->get(),
            'rank' => new Rank(),
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
        $rank = new Rank();

        return view('ranks.index', [
            'ranks' => Rank::latest()->get(),
            'rank' => $rank,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRankRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRankRequest $request)
    {
        //
        $validated = $request->validated();

        Rank::create($validated);

        return redirect()->route('ranks.index')->with('success', 'पद सफलतापूर्वक थपियो');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function show(Rank $rank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function edit(Rank $rank)
    {
        //
        return view('ranks.index', [
            'ranks' => Rank::latest()->get(),
            'rank' => $rank,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRankRequest  $request
     * @param  \App\Models\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRankRequest $request, Rank $rank)
    {
        //
        $validated = $request->validated();

        $rank->update($validated);

        return redirect()->route('ranks.index')->with('success', 'पद सफलतापूर्वक सम्पादन गरियो');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rank $rank)
    {
        //
        $rank->delete();

        return redirect()->route('ranks.index')->with('success', 'पद हटाइयो');
    }
}
