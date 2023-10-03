<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\SuchiApiController;
use App\Http\Controllers\SuchiController;
use App\Http\Controllers\SuchiPrintController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Auth::routes(['register' => false]);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', LogoutController::class)->name('logout');

Route::get('/', [FrontendController::class,'landingPage'])->name('landing-page');
Route::get('apply', [FrontendController::class, 'showApplicationForm']);
Route::post('suchi', [SuchiController::class, 'store']);
Route::get('application-submitted/{suchi}', [FrontendController::class, 'applicationSubmitted']);
Route::get('token-search', [FrontendController::class, 'tokenSearch']);


Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('language/{locale}', [LanguageController::class, 'setLocale'])->name('locale');
// Route::get('set-active-fiscal-year/{fiscalYear}', 'MiscController@setActiveFiscalYear')->name('set-active-fiscal-year');

Route::group(['middleware' => 'auth'], function () {
    Route::resources([
        'user' => UserController::class,
        'province' => ProvinceController::class,
        'district' => \App\Http\Controllers\DistrictController::class,
        'municipality' => \App\Http\Controllers\MunicipalityController::class,
        'ward' => \App\Http\Controllers\WardController::class,
    ]);

    // Suchi routes
    Route::get('suchi', [SuchiController::class, 'index'])->name('suchi.index');
    Route::get('suchi/applications', [SuchiController::class, 'applications'])->name('suchi.applications');
    Route::get('suchi/create', [SuchiController::class, 'create'])->name('suchi.create');
    Route::get('suchi/{suchi}', [SuchiController::class, 'show'])->name('suchi.show');
    Route::get('suchi/{suchi}/edit', [SuchiController::class, 'edit'])->name('suchi.edit');
    Route::post('suchi/{suchi}/update', [SuchiController::class, 'update']);
    Route::patch('suchi/{suchi}/register', [SuchiController::class, 'register'])->name('suchi.register');

    // Route::get('export-suchis', [SuchiController::class, 'export'])->name('suchi-export');


    // Route::get('api/suchi', [SuchiApiController::class, 'registered']);

    // Suchi types route
    Route::resource('suchi-types', SuchiTypeController::class);

    // Fiscal year
    // Route::get('fiscal-year/{fiscalYear?}', 'FiscalYearController@index')->name('fiscal-year.index');
    // Route::post('fiscal-year', 'FiscalYearController@store')->name('fiscal-year.store');
    // Route::put('fiscal-year/{fiscalYear}', 'FiscalYearController@update')->name('fiscal-year.update');
    // Route::delete('fiscal-year/{fiscalYear}', 'FiscalYearController@destroy')->name('fiscal-year.destroy');

    // Change password
    Route::get('change-password/{user}', [\App\Http\Controllers\UserPasswordController::class, 'form'])->name('password.change.form');
    Route::put('change-password/{user}', [\App\Http\Controllers\UserPasswordController::class, 'change'])->name('password.change');

    Route::get('settings-items', [\App\Http\Controllers\SettingsController::class, 'items'])->name('settings.items');
    Route::get('settings', [\App\Http\Controllers\SettingsController::class, 'index'])->name('settings.index');
    Route::post('settings', [\App\Http\Controllers\SettingsController::class, 'sync'])->name('settings.sync');

    Route::get('configuration-checklist', [\App\Http\Controllers\ConfigurationChecklistController::class, 'index'])->name('configuration-checklist.index');
});

  // Suchi Print
//   Route::get('suchi-print-application/{suchi}', [SuchiPrintController::class, 'index'])->name('suchi-print-application');
//   Route::get('suchi-print-certificate/{suchi}', [SuchiPrintController::class, 'certificate'])->name('suchi-print-certificate')->middleware('auth');

// Logs
Route::group(['middleware' => ['auth', 'role:super-admin']], function () {
    Route::get('admin/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('admin.logs');
});
