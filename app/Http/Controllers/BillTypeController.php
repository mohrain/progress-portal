<?php

namespace App\Http\Controllers;

use App\BillType;
use App\Http\Requests\StoreBillTypeRequest;
use App\Http\Requests\UpdateBillTypeRequest;

class BillTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BillType $billType = null)
    {
        if (!$billType) {
            $billType = new BillType();
        }
        $billTypes = BillType::get();
        return view('bill-types.index', compact('billType', 'billTypes'));
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
     * @param  \App\Http\Requests\StoreBillTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBillTypeRequest $request)
    {
        BillType::create($request->validated());
        return redirect()
            ->back()
            ->with('success', 'Bill Type Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BillType  $billType
     * @return \Illuminate\Http\Response
     */
    public function show(BillType $billType)
    {
        $bills = $billType
            ->bills()
            ->published()
            ->latest()
            ->paginate(50);
        return view('frontend.bill-types.show', compact('billType', 'bills'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BillType  $billType
     * @return \Illuminate\Http\Response
     */
    public function edit(BillType $billType)
    {
        return $this->index($billType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBillTypeRequest  $request
     * @param  \App\BillType  $billType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBillTypeRequest $request, BillType $billType)
    {
        $billType->update($request->validated());
        return redirect()
            ->route('bill-types.index')
            ->with('success', 'Bill Type Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BillType  $billType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillType $billType)
    {
        $billType->delete();
        return redirect()
            ->back()
            ->with('success', 'Bill Type Deleted');
    }
}
