<?php

namespace App\Http\Controllers;

use App\FiscalYear;
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

        $totalSuchisCount = Suchi::registeredOnly()->count();
        $totalSuchisApplicationsCount = Suchi::applicationOnly()->count();
        $totalUsersCount = User::count();

        return view('home', [
            'title' => $title,
            'totalSuchisCount' => $totalSuchisCount,
            'totalSuchisApplicationsCount' => $totalSuchisApplicationsCount,
            'totalUsersCount' => $totalUsersCount,
        ]);
    }
}
