<?php

namespace App\View\Components;

use App\FiscalYear;
use Illuminate\View\Component;

class DateFilter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $fiscalYears;
    public $nepaliMonths;
    public function __construct()
    {
        //
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
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.date-filter');
    }
}
