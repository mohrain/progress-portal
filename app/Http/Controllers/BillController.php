<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Http\Requests\StoreBillRequest;
use App\Http\Requests\UpdateBillRequest;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\New_;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::with('billType', 'billCategory', 'ministry', 'member')
            ->latest()
            ->paginate(50);
        return view('bills.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Bill $bill = null)
    {
        if (!$bill) {
            $bill = new Bill();
        }
        return view('bills.create', compact('bill'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBillRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBillRequest $request)
    {
        $data = $request->validated();
        if ($request->file('entry_bill_file')) {
            $data['entry_bill_file'] = Storage::putFile('bill-entry', $request->file('entry_bill_file'));
        }
        if ($request->file('certification_bill_file')) {
            $data['certification_bill_file'] = Storage::putFile('bill-certification', $request->file('certification_bill_file'));
        }
        Bill::create($data);
        return redirect()
            ->route('bills.index')
            ->with('success', 'Bill Entry Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        return $this->create($bill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBillRequest  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBillRequest $request, Bill $bill)
    {
        $data = $request->validated();
        if ($request->file('entry_bill_file')) {
            if ($bill->entry_bill_file) {
                Storage::delete($bill->entry_bill_file);
            }
            $data['entry_bill_file'] = Storage::putFile('bill-entry', $request->file('entry_bill_file'));
        }
        if ($request->file('certification_bill_file')) {
            if ($bill->certification_bill_file) {
                Storage::delete($bill->certification_bill_file);
            }
            $data['certification_bill_file'] = Storage::putFile('bill-certification', $request->file('certification_bill_file'));
        }

        $bill->update($data);
        return redirect()
            ->route('bills.index')
            ->with('success', 'Bill Entry updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        if ($bill->certification_bill_file) {
            Storage::delete($bill->certification_bill_file);
        }
        if ($bill->entry_bill_file) {
            Storage::delete($bill->entry_bill_file);
        }
        $bill->delete();
        return redirect()
            ->back()
            ->with('success', 'Bill Deleted');
    }
}
