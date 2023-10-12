<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BillTypeController;
use App\Http\Controllers\CarouselImageController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FrequentlyAskedQuestionController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ModalImageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostCategoryMenuController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\SuchiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Auth::routes(['register' => false]);
Route::get('login', [LoginController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', LogoutController::class)->name('logout');

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('pages/{page}', [PageController::class, 'show'])->name('pages.show');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('post-categories/{postCategory}', [PostCategoryController::class, 'show'])->name('post-categories.show');
Route::get('bill-types/{billType}', [BillTypeController::class, 'show'])->name('bill-types.show');
Route::get('faqs', [FrequentlyAskedQuestionController::class, 'frontend'])->name('faq.frontend');


Route::get('apply', [FrontendController::class, 'showApplicationForm']);
Route::post('suchi', [SuchiController::class, 'store']);
Route::get('application-submitted/{suchi}', [FrontendController::class, 'applicationSubmitted']);
Route::get('token-search', [FrontendController::class, 'tokenSearch']);

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('language/{locale}', [LanguageController::class, 'setLocale'])->name('locale');
// Route::get('set-active-fiscal-year/{fiscalYear}', 'MiscController@setActiveFiscalYear')->name('set-active-fiscal-year');

Route::group(['prefix' => 'backend', 'middleware' => 'auth'], function () {
    Route::resources([
        'user' => UserController::class,
        'province' => ProvinceController::class,
        'district' => \App\Http\Controllers\DistrictController::class,
        'municipality' => \App\Http\Controllers\MunicipalityController::class,
        'ward' => \App\Http\Controllers\WardController::class,
    ]);

    //pages
    Route::get('pages', [PageController::class, 'index'])->name('pages.index');
    Route::get('pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::post('pages', [PageController::class, 'store'])->name('pages.store');
    Route::get('pages/{page}/edit', [PageController::class, 'edit'])->name('pages.edit');
    Route::put('pages/{page}', [PageController::class, 'update'])->name('pages.update');
    Route::delete('pages/{page}', [PageController::class, 'destroy'])->name('pages.destroy');

    //documemts
    Route::delete('documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');

    //post-categories
    Route::get('post-categories', [PostCategoryController::class, 'index'])->name('post-categories.index');
    Route::post('post-categories', [PostCategoryController::class, 'store'])->name('post-categories.store');
    Route::get('post-categories/{postCategory}/edit', [PostCategoryController::class, 'edit'])->name('post-categories.edit');
    Route::put('post-categories/{postCategory}', [PostCategoryController::class, 'update'])->name('post-categories.update');
    Route::delete('post-categories/{postCategory}', [PostCategoryController::class, 'destroy'])->name('post-categories.destroy');

    //category menu
    Route::get('post-category-menu', [PostCategoryMenuController::class, 'index'])->name('post-category-menu.index');
    Route::post('post-category-menu', [PostCategoryMenuController::class, 'store'])->name('post-category-menu.store');
    Route::get('post-category-menu/{postCategoryMenu}/edit', [PostCategoryMenuController::class, 'edit'])->name('post-category-menu.edit');
    Route::put('post-category-menu/{postCategoryMenu}', [PostCategoryMenuController::class, 'update'])->name('post-category-menu.update');
    Route::put('post-category-menus/sort', [PostCategoryMenuController::class, 'sort'])->name('post-category-menu.sort');
    Route::delete('post-category-menus/remove-item', [PostCategoryMenuController::class, 'removeItem'])->name('post-category-menu.remove-item');

    //post
    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('posts/search', [PostController::class, 'search'])->name('posts.search');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    //carousel-image
    Route::get('carousel-images', [CarouselImageController::class, 'index'])->name('carousel-images.index');
    Route::get('carousel-images/create', [CarouselImageController::class, 'create'])->name('carousel-images.create');
    Route::post('carousel-images', [CarouselImageController::class, 'store'])->name('carousel-images.store');
    Route::get('carousel-images/{carouselImage}/edit', [CarouselImageController::class, 'edit'])->name('carousel-images.edit');
    // Route::get('carousel-images/{carouselImage}', [CarouselImageController::class, 'show'])->name('carousel-images.show');
    Route::put('carousel-images/{carouselImage}', [CarouselImageController::class, 'update'])->name('carousel-images.update');
    Route::delete('carousel-images/{carouselImage}', [CarouselImageController::class, 'destroy'])->name('carousel-images.destroy');

    //modal-images
    Route::get('modal-images', [ModalImageController::class, 'index'])->name('modal-images.index');
    Route::get('modal-images/create', [ModalImageController::class, 'create'])->name('modal-images.create');
    Route::post('modal-images', [ModalImageController::class, 'store'])->name('modal-images.store');
    Route::get('modal-images/{modalImage}/edit', [ModalImageController::class, 'edit'])->name('modal-images.edit');
    Route::put('modal-images/{modalImage}', [ModalImageController::class, 'update'])->name('modal-images.update');
    Route::delete('modal-images/{modalImage}', [ModalImageController::class, 'destroy'])->name('modal-images.destroy');


      //faq
      Route::get('faq', [FrequentlyAskedQuestionController::class, 'index'])->name('faq.index');
      Route::get('faq/create', [FrequentlyAskedQuestionController::class, 'create'])->name('faq.create');
      Route::post('faq', [FrequentlyAskedQuestionController::class, 'store'])->name('faq.store');
      Route::put('faq/sort', [FrequentlyAskedQuestionController::class, 'sort'])->name('faq.sort');
      Route::get('faq/{frequentlyAskedQuestion}/edit', [FrequentlyAskedQuestionController::class, 'edit'])->name('faq.edit');
      Route::put('faq/{frequentlyAskedQuestion}', [FrequentlyAskedQuestionController::class, 'update'])->name('faq.update');
      Route::delete('faq/{frequentlyAskedQuestion}', [FrequentlyAskedQuestionController::class, 'destroy'])->name('faq.destroy');

      
    //Bidhayak types
    Route::get('bill-types', [BillTypeController::class, 'index'])->name('bill-types.index');
    Route::post('bill-types', [BillTypeController::class, 'store'])->name('bill-types.store');
    Route::get('bill-types/{billType}/edit', [BillTypeController::class, 'edit'])->name('bill-types.edit');
    Route::put('bill-types/{billType}', [BillTypeController::class, 'update'])->name('bill-types.update');
    Route::delete('bill-types/{billType}', [BillTypeController::class, 'destroy'])->name('bill-types.destroy');

    //meeting
    Route::get('meetings', [MeetingController::class, 'index'])->name('meetings.index');
    Route::post('meetings', [MeetingController::class, 'store'])->name('meetings.store');
    Route::get('meetings/{meeting}/edit', [MeetingController::class, 'edit'])->name('meetings.edit');
    Route::put('meetings/{meeting}', [MeetingController::class, 'update'])->name('meetings.update');
    Route::delete('meetings/{meeting}', [MeetingController::class, 'destroy'])->name('meetings.destroy');

    
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
