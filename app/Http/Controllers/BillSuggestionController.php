<?php

namespace App\Http\Controllers;

use App\Models\BillSuggestion;
use App\Http\Requests\StoreBillSuggestionRequest;
use App\Http\Requests\UpdateBillSuggestionRequest;
use App\Models\Bill;
use Illuminate\Support\Facades\Storage;

class BillSuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Bill $bill)
    {
        return view('frontend.bill-suggestions.create', compact('bill'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBillSuggestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBillSuggestionRequest $request, Bill $bill)
    {
        $data = $request->validated();
        if ($request->file('file')) {
            $data['file'] = Storage::putFile('bill-suggestion', $request->file('file'));
        }
        $bill->billSuggestions()->create($data);
        return redirect()
            ->back()
            ->with('success', 'तपाईंको सुझाव पठाइयो धन्यवाद');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BillSuggestion  $billSuggestion
     * @return \Illuminate\Http\Response
     */
    public function show(BillSuggestion $billSuggestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BillSuggestion  $billSuggestion
     * @return \Illuminate\Http\Response
     */
    public function edit(BillSuggestion $billSuggestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBillSuggestionRequest  $request
     * @param  \App\Models\BillSuggestion  $billSuggestion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBillSuggestionRequest $request, BillSuggestion $billSuggestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BillSuggestion  $billSuggestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillSuggestion $billSuggestion)
    {
        //
    }
}
