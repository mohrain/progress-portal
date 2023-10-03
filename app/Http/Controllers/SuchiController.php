<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterSuchiRequest;
use App\Http\Requests\SuchiStoreRequest;
use App\Http\Requests\SuchiUpdateRequest;
use App\Queries\SuchiQuery;
use App\Suchi;
use App\SuchiType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class SuchiController extends Controller
{
    public function index()
    {
        $suchiQuery = new SuchiQuery();
        $suchis = $suchiQuery->registeredOnly()->latest()->paginate();
        return view('suchi.index', [
            'suchis' => $suchis
        ]);
    }

    public function export()
    {
        return Excel::download(new \App\Exports\SuchisExport, 'suchis.xlsx');
    }

    public function applications()
    {
        $suchiQuery = new SuchiQuery();
        $suchis = $suchiQuery->applicationOnly()->latest()->paginate();
        return view('suchi.applications', [
            'suchis' => $suchis
        ]);
    }

    public function create()
    {
        $regNoPrefix = running_fiscal_year()->name;
        $suchi = new Suchi([
            'reg_no_prefix' => $regNoPrefix,
            'reg_no' => Suchi::getNextRegno(),
            'reg_date' => ad_to_bs(now()->format('Y-m-d'))
        ]);
        return $this->showForm($suchi);
    }

    public function showForm(Suchi $suchi)
    {
        $suchiTypes = SuchiType::get();

        return view('suchi.form', [
            'suchi' => $suchi,
            'updateMode' => $suchi->exists ? true : false,
            'suchiTypes' => $suchiTypes
        ]);
    }

    public function store(SuchiStoreRequest $request)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            foreach (config('constants.suchi_document_keys') as $key) {
                if ($request->hasFile($key)) {
                    $data[$key] = $request->file($key)->store('documents');
                }
            }

            $suchi = Suchi::create($data);

            if (auth()->check() && referer_route_match(route('suchi.create'))) {
                $suchi->registerNow();
            }
            DB::commit();

            return response()->json([
                'status' => 200,
                'message' => 'New Suchi has been created.',
                'hash_id' => $suchi->hash_id,
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            return response()->json([
                'status' => 500,
                'message' => 'Sorry something went wrong while processing request.'
            ], 500);
        }
    }

    public function show(Suchi $suchi)
    {
        return view('suchi.show', compact('suchi'));
    }

    public function edit(Suchi $suchi)
    {
        return $this->showForm($suchi);
    }

    public function update(SuchiUpdateRequest $request, Suchi $suchi)
    {
        try {
            DB::beginTransaction();
            $suchi->fill($request->only([
                'reg_date',
                'name',
                'address',
                'contact_person',
                'contact',
                'email',
                'mobile',
                'suchi_type_id',
                'product_type',
                'receipt_no',
                'receipt_amount',
            ]));

            $filesToDelete = [];
            $newelyUpdatedFiles = [];
            foreach (config('constants.suchi_document_keys') as $key) {
                if ($request->hasFile($key)) {
                    if ($suchi->{$key}) {
                        $filesToDelete[] = $suchi->{$key};
                    }
                    $suchi->{$key} = $request->file($key)->store('documents');
                    $newelyUpdatedFiles[] = $suchi->{$key};
                }
            }
            $suchi->save();

            // Delete old files
            Storage::delete($filesToDelete);

            DB::commit();

            return response()->json([
                'status' => 200,
                'message' => 'Changes have been saved.',
                'hash_id' => $suchi->hash_id,
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            // Delete newely updated files
            Storage::delete($newelyUpdatedFiles);
            report($th);
            return response()->json([
                'status' => 500,
                'message' => 'Sorry something went wrong while processing request.'
            ], 500);
        }
    }

    public function register(RegisterSuchiRequest $request, Suchi $suchi)
    {
        if ($suchi->isRegistered()) {
            return back()->with('error', 'Already registered');
        }

        $suchi->update([
            'receipt_no' => $request->receipt_no,
            'receipt_amount' => $request->receipt_amount
        ]);
        $suchi->registerNow();

        return response()->json([
            'message' => 'Registered successfully'
        ]);

        return redirect()->back()->with('success', 'success');
    }
}
