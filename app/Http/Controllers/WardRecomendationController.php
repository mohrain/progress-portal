<?php

namespace App\Http\Controllers;

use App\FiscalYear;
use App\Models\WardRecomendation;
use App\Http\Requests\StoreWardRecomendationRequest;
use App\Http\Requests\UpdateWardRecomendationRequest;
use App\Models\RecomendationType;
use App\Ward;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class WardRecomendationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fiscalYears = FiscalYear::all();

        $recommendationTypes = RecomendationType::all();

        $fy = $request->fiscal_year_id ?? running_fiscal_year()->id;

        // Chart Data: For each recommendation type, sum the values
        $fy = $request->fiscal_year_id ?? running_fiscal_year()->id;

        // Chart Data: For each recommendation type, sum the values
        $chartData = $recommendationTypes->map(function ($type) use ($fy, $request) {
            $query = \App\Models\WardRecomendation::where('recomendation_type_id', $type->id)
                ->when($fy, function ($q) use ($fy) {
                    $q->where('fiscal_year_id', $fy);
                })
                ->when($request->month, function ($q) use ($request) {
                    $q->where('month', $request->month);
                });

            return [
                'type' => $type->name,
                'total_application' => $query->sum('total_application'),
                'total_recomended' => $query->sum('total_recomended'),
                'total_darta' => $query->sum('total_darta'),
                'total_chalani' => $query->sum('total_chalani'),
            ];
        });

        return view('ward.recomendation.rec-index', compact(
            'fiscalYears',
            'recommendationTypes',
            'chartData'
        ));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fiscalYears = FiscalYear::all();
        $wards = Ward::all('id', 'name', 'name_en');
        $recommendationTypes = RecomendationType::all();
        return view('ward.recomendation.rec-form', compact('fiscalYears', 'wards', 'recommendationTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWardRecomendationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWardRecomendationRequest $request)
    {
        //


        foreach ($request->recommendations as $typeId => $data) {
            // Use updateOrCreate instead of new WardRecomendation()
            WardRecomendation::updateOrCreate(
                [
                    'fiscal_year_id' => $request->fiscal_year_id,
                    'ward_id' => user_ward()->id,
                    'month' => $request->month,
                    'recomendation_type_id' => $data['recomendation_type_id'],
                ],
                [
                    'total_application' => $data['total_application'] ?? 0,
                    'total_recomended' => $data['total_recomended'] ?? 0,
                    'total_darta' => $data['total_darta'] ?? 0,
                    'total_chalani' => $data['total_chalani'] ?? 0,
                    'remarks' => $data['remarks'] ?? null,
                    'updated_by' => auth()->id(),
                    'created_by' => auth()->id(),
                ]
            );
        }


        return redirect()->back()->with('success', 'सिफारिस सुरक्षित भयो');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WardRecomendation  $wardRecomendation
     * @return \Illuminate\Http\Response
     */
    public function show(WardRecomendation $wardRecomendation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WardRecomendation  $wardRecomendation
     * @return \Illuminate\Http\Response
     */
    public function edit(WardRecomendation $wardRecomendation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWardRecomendationRequest  $request
     * @param  \App\Models\WardRecomendation  $wardRecomendation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWardRecomendationRequest $request, WardRecomendation $wardRecomendation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WardRecomendation  $wardRecomendation
     * @return \Illuminate\Http\Response
     */
    public function destroy(WardRecomendation $wardRecomendation)
    {
        //
    }

    public function getRecommendations(Request $request)
    {
        $request->validate([
            'fiscal_year_id' => 'required|exists:fiscal_years,id',
            'month' => 'required|integer|min:1|max:12',
        ]);

        $fiscalYearId = $request->fiscal_year_id;
        $month = $request->month;

        // Fetch all recommendations for that fiscal year and month
        $recommendations = WardRecomendation::where('fiscal_year_id', $fiscalYearId)
            ->where('month', $month)
            ->get()
            ->keyBy('recomendation_type_id'); // key by recommendation type id for easy lookup

        return response()->json($recommendations);
    }
}
