<?php

namespace App\View\Components\Frontend;

use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

class VisitorCounter extends Component
{
    public $count;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $file = 'count.txt';

        $this->count = Storage::get($file) ?? 0;
        $this->count++;

        Storage::put($file, $this->count);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
            <span class="kalimati-font btn btn-sm btn-primary px-3">
                {{ $count }}
            </span>
        blade;
    }
}
