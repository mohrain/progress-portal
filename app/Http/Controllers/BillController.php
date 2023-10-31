<?php

namespace App\Http\Controllers;

use App\BillType;
use App\Models\Bill;
use App\Http\Requests\StoreBillRequest;
use App\Http\Requests\UpdateBillRequest;
use Illuminate\Http\Request;
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
            ->with('success', 'विधयेक सुरक्षित भयो');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        return view('frontend.bills.show', compact('bill'));
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
            ->with('success', 'विधयेक सम्पादन भयो');
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
            ->with('success', 'विधयेक हटाइयो');
    }

    public function entryBillFile(Bill $bill)
    {
        if ($bill->entry_bill_file) {
            Storage::delete($bill->entry_bill_file);
            $bill->update([
                'entry_bill_file' => '',
            ]);
        }
        return redirect()
            ->back()
            ->with('success', 'दर्ता विधेयक फाइल हटाइयो');
    }
    public function certificationBillFile(Bill $bill)
    {
        if ($bill->certification_bill_file) {
            Storage::delete($bill->certification_bill_file);
            $bill->update([
                'certification_bill_file' => '',
            ]);
        }
        return redirect()
            ->back()
            ->with('success', 'प्रमाणीकरण विधेयक फाइल हटाइयो');
    }

    public function search(Request $request)
    {
        $bills = new Bill();
        if ($request->has('name')) {
            if ($request->name != null) {
                $bills = $bills->where('name', 'like', '%' . $request->name . '%');
            }
        }
        if ($request->has('bill_type_id')) {
            if ($request->bill_type_id != null) {
                $bills = $bills->where('bill_type_id', $request->bill_type_id);
            }
        }
        if ($request->has('entry_number')) {
            if ($request->entry_number != null) {
                $bills = $bills->where('entry_number', $request->entry_number);
            }
        }
        if ($request->has('year')) {
            if ($request->year != null) {
                $bills = $bills->where('year', $request->year);
            }
        }

        if ($request->has('entry_date')) {
            if ($request->entry_date != null) {
                $bills = $bills->where('entry_date', $request->entry_date);
            }
        }

        if ($request->has('member_id')) {
            if ($request->member_id != null) {
                $bills = $bills->where('member_id', $request->member_id);
            }
        }
        if ($request->has('ministry_id')) {
            if ($request->ministry_id != null) {
                $bills = $bills->where('ministry_id', $request->ministry_id);
            }
        }
        if ($request->has('suggestion_in_the_bill')) {
            if ($request->suggestion_in_the_bill != null) {
                $bills = $bills->where('suggestion_in_the_bill', $request->suggestion_in_the_bill);
            }
        }

        if ($request->has('convention')) {
            if ($request->convention != null) {
                $bills = $bills->where('convention', $request->convention);
            }
        }
        if ($request->has('gov_non_gov')) {
            if ($request->gov_non_gov != null) {
                $bills = $bills->where('gov_non_gov', $request->gov_non_gov);
            }
        }

        if ($request->has('original_amendment')) {
            if ($request->original_amendment != null) {
                $bills = $bills->where('original_amendment', $request->original_amendment);
            }
        }
        if ($request->has('bill_category_id')) {
            if ($request->bill_category_id != null) {
                $bills = $bills->where('bill_category_id', $request->bill_category_id);
            }
        }

        if ($request->has('distribution_to_members_date')) {
            if ($request->distribution_to_members_date != null) {
                $bills = $bills->where('distribution_to_members_date', $request->distribution_to_members_date);
            }
        }

        if ($request->has('representative_presented_in_assembly_date')) {
            if ($request->representative_presented_in_assembly_date != null) {
                $bills = $bills->where('representative_presented_in_assembly_date', $request->representative_presented_in_assembly_date);
            }
        }
        if ($request->has('general_discussion_date')) {
            if ($request->general_discussion_date != null) {
                $bills = $bills->where('general_discussion_date', $request->general_discussion_date);
            }
        }
        if ($request->has('weekly_in_assembly_discussion_date')) {
            if ($request->weekly_in_assembly_discussion_date != null) {
                $bills = $bills->where('weekly_in_assembly_discussion_date', $request->weekly_in_assembly_discussion_date);
            }
        }

        if ($request->has('weekly_in_committee_discussion_date')) {
            if ($request->weekly_in_committee_discussion_date != null) {
                $bills = $bills->where('weekly_in_committee_discussion_date', $request->weekly_in_committee_discussion_date);
            }
        }
        if ($request->has('committee_report_submission_date')) {
            if ($request->committee_report_submission_date != null) {
                $bills = $bills->where('committee_report_submission_date', $request->committee_report_submission_date);
            }
        }
        if ($request->has('passed_by_assembly_date')) {
            if ($request->passed_by_assembly_date != null) {
                $bills = $bills->where('passed_by_assembly_date', $request->passed_by_assembly_date);
            }
        }
        if ($request->has('assembly_rejected_date')) {
            if ($request->assembly_rejected_date != null) {
                $bills = $bills->where('assembly_rejected_date', $request->assembly_rejected_date);
            }
        }
        if ($request->has('repassed_date')) {
            if ($request->repassed_date != null) {
                $bills = $bills->where('repassed_date', $request->repassed_date);
            }
        }
        if ($request->has('authentication_date')) {
            if ($request->authentication_date != null) {
                $bills = $bills->where('authentication_date', $request->authentication_date);
            }
        }
        if ($request->has('status')) {
            if ($request->status != null) {
                $bills = $bills->where('status', $request->status);
            }
        }

        $bills = $bills->with('billType', 'billCategory', 'ministry', 'member')->paginate(50);
        $bills->appends(request()->except('page'));
        return view('bills.index', compact('bills'));
    }

    public function frontendSearch(Request $request, BillType $billType)
    {
        $bills = $billType->bills();
        if ($request->has('name')) {
            if ($request->name != null) {
                $bills = $bills->where('name', 'like', '%' . $request->name . '%');
            }
        }

        if ($request->has('entry_number')) {
            if ($request->entry_number != null) {
                $bills = $bills->where('entry_number', $request->entry_number);
            }
        }
        if ($request->has('bill_date_from')) {
            if ($request->bill_date_from != null && $request->bill_date_to != null) {
                $bills = $bills->whereBetween('entry_date', [$request->bill_date_from, $request->bill_date_to]);
            }
        }

        $bills = $bills->with('billType', 'billCategory', 'ministry', 'member')->paginate(50);
        $bills->appends(request()->except('page'));
        return view('frontend.bill-types.show', compact('billType', 'bills'));
    }
}
