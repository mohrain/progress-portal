<?php

namespace App\Http\Controllers;

use App\FiscalYear;
use App\Models\WardRecomendation;
use App\Http\Requests\StoreWardRecomendationRequest;
use App\Http\Requests\UpdateWardRecomendationRequest;
use App\Models\RecomendationType;
use App\Models\WardApplication;
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
        $month = $request->month;

        // Grouped Ward Recommendations
        $wardRecs = \App\Models\WardRecomendation::query()
            ->where('fiscal_year_id', $fy)
            ->when($month, fn($q) => $q->where('month', $month))
            ->get()
            ->groupBy('recomendation_type_id');

        // Global totals from applications
        $wardApps = \App\Models\WardApplication::query()
            ->where('fiscal_year_id', $fy)
            ->when($month, fn($q) => $q->where('month', $month))
            ->get();
        // Chart data: only recommendation totals by type
        $chartData = $recommendationTypes->map(function ($type) use ($wardRecs) {
            $recGroup = $wardRecs->get($type->id, collect());
            return [
                'type'             => $type->name,
                'total_recomended' => $recGroup->sum('total_recomended'),
            ];
        });
        $totalRecommended = $chartData->sum('total_recomended');

        $totals = [
            'total_application' => $wardApps->sum('total_application'),
            'total_darta'       => $wardApps->sum('total_darta'),
            'total_chalani'     => $wardApps->sum('total_chalani'),
            'total_recomended'  => $totalRecommended,
        ];



        return view('ward.recomendation.rec-index', compact(
            'fiscalYears',
            'recommendationTypes',
            'chartData',
            'totals'
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
        $wardId = user_ward()->id;
        $fiscalYearId = $request->fiscal_year_id;
        $month = $request->month;
        $userId = auth()->id();


        // Store or update main ward application summary
        WardApplication::updateOrCreate(
            [
                'fiscal_year_id' => $fiscalYearId,
                'ward_id' => $wardId,
                'month' => $month,
            ],
            [
                'total_application' => $request->input('total_application', 0),
                'total_darta'       => $request->input('total_darta', 0),
                'total_chalani'     => $request->input('total_chalani', 0),
                'remarks'           => $request->remarks,
                'updated_by'        => $userId,
                'created_by'        => $userId,
            ]
        );

        // Store or update each recommendation record
        foreach ($request->recommendations as $typeId => $data) {
            WardRecomendation::updateOrCreate(
                [
                    'fiscal_year_id'         => $fiscalYearId,
                    'ward_id'                => $wardId,
                    'month'                  => $month,
                    'recomendation_type_id'  => $data['recomendation_type_id'],
                ],
                [
                    'total_recomended'       => $data['total_recomended'] ?? 0,
                    'remarks'                => $data['remarks'] ?? null,
                    'updated_by'             => $userId,
                    'created_by'             => $userId,
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
        $wardId = user_ward()->id;

        // Fetch ward application summary
        $application = WardApplication::where('fiscal_year_id', $fiscalYearId)
            ->where('month', $month)
            ->where('ward_id', $wardId)
            ->first();

        // Fetch all recommendations for that fiscal year and month
        $recommendations = WardRecomendation::where('fiscal_year_id', $fiscalYearId)
            ->where('month', $month)
            ->where('ward_id', $wardId)
            ->get()
            ->keyBy('recomendation_type_id');

        return response()->json([
            'application' => $application,
            'recommendations' => $recommendations,
        ]);
    }
}
