<?php

namespace App\Http\Controllers;

use App\Models\BillCategory;
use App\Http\Requests\StoreBillCategoryRequest;
use App\Http\Requests\UpdateBillCategoryRequest;

class BillCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BillCategory $billCategory = null)
    {
        if (!$billCategory) {
            $billCategory = new BillCategory();
        }
        $billCategories = BillCategory::latest()->get();
        return view('bill-categories.index', compact('billCategory', 'billCategories'));
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
     * @param  \App\Http\Requests\StoreBillCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBillCategoryRequest $request)
    {
        BillCategory::create($request->validated());
        return redirect()->back()->with('success',"Bill Category Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BillCategory  $billCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BillCategory $billCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BillCategory  $billCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BillCategory $billCategory)
    {
        return $this->index($billCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBillCategoryRequest  $request
     * @param  \App\Models\BillCategory  $billCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBillCategoryRequest $request, BillCategory $billCategory)
    {
        $billCategory->update($request->validated());
        return redirect()->route('bill-categories.index')->with('success','Bill Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BillCategory  $billCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillCategory $billCategory)
    {
        $billCategory->delete();
        return redirect()->back()->with('success',"Bill category Deleted");
    }
}
