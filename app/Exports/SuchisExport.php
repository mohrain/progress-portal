<?php

namespace App\Exports;

use App\Queries\SuchiQuery;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SuchisExport implements FromView
{
    public function view(): View
    {
        $suchiQuery = new SuchiQuery();
        $suchis = $suchiQuery->registeredOnly()->get();
        return view('suchi.export', [
            'suchis' => $suchis
        ]);
    }
}
