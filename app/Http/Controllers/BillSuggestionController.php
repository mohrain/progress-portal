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
    public function index(Bill $bill)
    {
        $billSuggestions = $bill
            ->billSuggestions()
            ->latest()
            ->paginate(50);
        return view('bill-suggestions.index', compact('billSuggestions', 'bill'));
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
        // return $request;
        $data = $request->validated();
        if ($request->file('file')) {
            $data['file'] = Storage::putFile('bill-suggestion', $request->file('file'));
        }
        $billSuggestion = $bill->billSuggestions()->create($data);

        if ($request->section != '') {
            foreach ($request->section as $key => $section) {
                $billSuggestion->billSuggestionSectionWise()->create([
                    'section' => $section,
                    'sub_section' => $request->sub_section[$key],
                    'sec' => $request->sec[$key],
                    'current_arrangement' => $request->current_arrangement[$key],
                    'procedure_of_amendment' => $request->procedure_of_amendment[$key],
                    'reason' => $request->reason[$key],
                ]);
            }
        }

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
    public function show(Bill $bill, BillSuggestion $billSuggestion)
    {
        return view('bill-suggestions.show', compact('billSuggestion', 'bill'));
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
    public function destroy(Bill $bill, BillSuggestion $billSuggestion)
    {
        $billSuggestion->delete();
        return redirect()
            ->back()
            ->with('success', 'सुझाव मेटाइयो');
    }
}
