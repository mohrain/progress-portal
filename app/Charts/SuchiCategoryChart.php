<?php

declare(strict_types=1);

namespace App\Charts;

use App\Suchi;
use App\SuchiType;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class SuchiCategoryChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $suchiTypes = SuchiType::get();
        $datasets = [];
        foreach ($suchiTypes as $suchiType) {
            $datasets[] = Suchi::fromActiveFiscalYear()->registeredOnly()
                ->where('suchi_type_id', $suchiType->id)->count();
        }
        $labels = $suchiTypes->pluck('title')->toArray();

        return Chartisan::build()
            ->labels($labels)
            ->dataset(active_fiscal_year()->name, $datasets);
    }
}
