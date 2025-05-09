<?php

namespace App\View\Components;

use App\Models\Department;
use Illuminate\View\Component;

class DepartmentFrontView extends Component
{

    public $departments;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->departments = Department::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.department-front-view');
    }
}
