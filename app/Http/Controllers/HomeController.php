<?php

namespace App\Http\Controllers;

use App\BillType;
use App\FiscalYear;
use App\Models\Bill;
use App\Models\Committee;
use App\Models\Employee;
use App\Models\Member;
use App\Models\ProvincialAssemblyLibrary;
use App\Suchi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = 'Dashboard';

        $billTypes = BillType::get();
        $committeeCount = Committee::count();
        $employeeCount = Employee::count();
        $memberCount = Member::currentElection()->count();

        $totalUsersCount = User::count();
        $totalBooksCount = ProvincialAssemblyLibrary::count();

        return view('home', [
            'title' => $title,
            'billTypes' => $billTypes,
            'committeeCount' => $committeeCount,
            'employeeCount' => $employeeCount,
            'memberCount' => $memberCount,
            'totalUsersCount' => $totalUsersCount,
            'totalBooksCount'=>$totalBooksCount,
        ]);
    }
}
