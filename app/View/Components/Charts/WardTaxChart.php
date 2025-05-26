<?php

namespace App\View\Components\Charts;

use App\FiscalYear;
use App\Models\WardTax;
use App\Ward;
use Illuminate\View\Component;

class WardTaxChart extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $wardData, $fiscalYears, $nepaliMonths;
    public function __construct()
    {
        $this->nepaliMonths = [
            1 => 'श्रावण',
            2 => 'भदौ',
            3 => 'आश्विन',
            4 => 'कार्तिक',
            5 => 'मंसिर',
            6 => 'पुष',
            7 => 'माघ',
            8 => 'फाल्गुण',
            9 => 'चैत्र',
            10 => 'बैशाख',
            11 => 'जेठ',
            12 => 'आषाढ'
        ];
        $this->fiscalYears = FiscalYear::all();
        $wards = Ward::select('id', 'name')->get();

        // Get summed tax amounts grouped by ward_id
        $wardTaxes = WardTax::selectRaw('ward_id, SUM(amount) as total')
            ->groupBy('ward_id')
            ->pluck('total', 'ward_id'); // returns [ward_id => total]

        // Map wards to include amount (default to 0)
        $this->wardData = $wards->map(function ($ward) use ($wardTaxes) {
            return [
                'ward' => 'वडा नं.' . $ward->name ??  $ward->id,
                'amount' => $wardTaxes[$ward->id] ?? 0
            ];
        });
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.charts.ward-tax-chart');
    }
}
