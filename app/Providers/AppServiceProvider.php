<?php

namespace App\Providers;

use App\FiscalYear;
use App\Observers\FiscalYearObserver;
use App\Observers\SuchiObserver;
use App\Suchi;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        Paginator::useBootstrap();
        FiscalYear::observe(FiscalYearObserver::class);
        Suchi::observe(SuchiObserver::class);

        if (!app()->runningInConsole()) {
            if (Schema::hasTable('fiscal_years')) {
                if (!session()->has('active_fiscal_year')) {
                    session()->put('active_fiscal_year', running_fiscal_year());
                }
            }
        }

        $charts->register([
            \App\Charts\SuchiCategoryChart::class
        ]);
    }
}
