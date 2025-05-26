<?php

namespace App\Http\Controllers;

use App\FiscalYear;
use App\Models\TaxTitle;
use App\Models\WardTax;
use App\Ward;
use Illuminate\Http\Request;

class WardTaxController extends Controller
{
    //
    public function index(Request $request)
    {
        $month = $request->input('month', current_month());
        $fiscalYearId = $request->input('fiscal_year_id', running_fiscal_year()->id); // Ensure you're getting the ID
        $wardId = $request->input('ward_id', user_ward()->id); // Ensure user_ward() returns a valid ward object


        // यो महिनाको जम्मा
        $monthlyData = WardTax::with('taxTitle')
            ->selectRaw('tax_title_id, SUM(amount) as this_month_total')
            ->where('month', $month)
            ->where('fiscal_year_id', $fiscalYearId)
            ->where('ward_id', $wardId)
            ->groupBy('tax_title_id')
            ->get()
            ->keyBy('tax_title_id');

        // यो महिनासम्मको जम्मा
        $ytdData = WardTax::with('taxTitle')
            ->selectRaw('tax_title_id, SUM(amount) as ytd_total')
            ->where('month', '<=', $month)
            ->where('fiscal_year_id', $fiscalYearId)
            ->where('ward_id', $wardId)
            ->groupBy('tax_title_id')
            ->get()
            ->keyBy('tax_title_id');


        return view('ward.taxes.tax-index', compact('monthlyData', 'ytdData', 'month', 'fiscalYearId'));
    }

    public function create()
    {
        $fiscalYears = FiscalYear::all();
        $taxTitles = TaxTitle::all();

        return view('ward.taxes.tax-form', compact('fiscalYears', 'taxTitles'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fiscal_year_id' => 'required|exists:fiscal_years,id',
            'month' => 'required|integer|min:1|max:12',
            'taxes' => 'required|array',
            'taxes.*.amount' => 'required|numeric|min:0',
        ]);

        foreach ($validated['taxes'] as $taxTitleId => $taxData) {
            \App\Models\WardTax::updateOrCreate(
                [
                    'fiscal_year_id' => $validated['fiscal_year_id'],
                    'ward_id' => user_ward()->id,
                    'month' => $validated['month'],
                    'tax_title_id' => $taxTitleId,
                ],
                [
                    'amount' => $taxData['amount'],
                ]
            );
        }

        return redirect()->back()->with('success', 'Ward taxes saved successfully.');
    }


    public function getWardTaxes(Request $request)
    {

        $request->validate([
            'fiscal_year_id' => 'required|exists:fiscal_years,id',
            'month' => 'required|integer|min:1|max:12'
        ]);

        $taxes = WardTax::where('fiscal_year_id', $request->fiscal_year_id)
            ->where('ward_id', user_ward()->id)
            ->where('month', $request->month)
            ->get()
            ->keyBy('tax_title_id');



        return response()->json([
            'taxes' => $taxes->map(function ($tax) {
                return [
                    'amount' => $tax->amount
                ];
            })
        ]);
    }


    public function wardTaxesByMonth(Request $request)
    {
        $request->validate([
            'fiscal_year_id' => 'required|exists:fiscal_years,id',
            'month' => 'nullable|integer|min:1|max:12'
        ]);

        $fiscalYearId = $request->fiscal_year_id;
        $month = $request->month;

        $wards = Ward::select('id', 'name')->get();

        $wardTaxes = WardTax::selectRaw('ward_id, SUM(amount) as total')
            ->when($month, fn($q) => $q->where('month', $month))
            ->where('fiscal_year_id', $fiscalYearId)
            ->groupBy('ward_id')
            ->pluck('total', 'ward_id');

        $data = $wards->map(function ($ward) use ($wardTaxes) {
            return [
                'ward' => 'वडा नं. ' . ($ward->name ?? $ward->id),
                'amount' => $wardTaxes[$ward->id] ?? 0
            ];
        });

        return response()->json($data);
    }
}
