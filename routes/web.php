<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BillCategoryController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\BillSuggestionController;
use App\Http\Controllers\BillTypeController;
use App\Http\Controllers\CarouselImageController;
use App\Http\Controllers\CommitteeActivitycontroller;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\CommitteeDownloadController;
use App\Http\Controllers\CommitteeDownloadsController;
use App\Http\Controllers\CommitteeMemberController;
use App\Http\Controllers\CommitteeNoticecontroller;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDesignationController;
use App\Http\Controllers\FiscalYearController;
use App\Http\Controllers\FrequentlyAskedQuestionController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationOfficerController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MinistryController;
use App\Http\Controllers\ModalImageController;
use App\Http\Controllers\OfficeBearerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ParliamentaryPartyController;
use App\Http\Controllers\PhotoController;
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

Route::post('login', [LoginController::class, 'login'])->name('login.post');
Route::post('logout', LogoutController::class)->name('logout');

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('pages/{page}', [PageController::class, 'show'])->name('pages.show');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('post-categories/{postCategory}', [PostCategoryController::class, 'show'])->name('post-categories.show');
Route::get('faqs', [FrequentlyAskedQuestionController::class, 'frontend'])->name('faq.frontend');
Route::get('parliamentary-parties', [ParliamentaryPartyController::class, 'frontend'])->name('parliamentary-parties.frontend');
Route::get('bill-types/{billType}', [BillTypeController::class, 'show'])->name('bill-types.show');
Route::get('bills/{bill}', [BillController::class, 'show'])->name('bills.show');
Route::get('bill-suggestions/{bill}', [BillSuggestionController::class, 'create'])->name('bill-suggestions.create');
Route::post('bill-suggestions/{bill}', [BillSuggestionController::class, 'store'])->name('bill-suggestions.store');
Route::get('members', [MemberController::class, 'frontendIndex'])->name('members.frontendIndex');
Route::get('members/old', [MemberController::class, 'frontendIndexOld'])->name('members.frontendIndexOld');
Route::get('members/{member}', [MemberController::class, 'show'])->name('members.show');
Route::get('employees', [EmployeeController::class, 'frontendIndex'])->name('employees.frontendIndex');
Route::get('employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
Route::get('office-bearers', [OfficeBearerController::class, 'frontendIndex'])->name('office-bearers.frontendIndex');
Route::get('office-bearers/old', [OfficeBearerController::class, 'frontendIndexOld'])->name('office-bearers.frontendIndexOld');
Route::get('contact-us', [ContactUsController::class, 'create'])->name('contact-us.create');
Route::post('contact-us', [ContactUsController::class, 'store'])->name('contact-us.store');

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

    //parliamentary-parties
    Route::get('parliamentary-parties', [ParliamentaryPartyController::class, 'index'])->name('parliamentary-parties.index');
    Route::put('parliamentary-parties/sort', [ParliamentaryPartyController::class, 'sort'])->name('parliamentary-parties.sort');
    Route::post('parliamentary-parties', [ParliamentaryPartyController::class, 'store'])->name('parliamentary-parties.store');
    Route::get('parliamentary-parties/{parliamentaryParty}/edit', [ParliamentaryPartyController::class, 'edit'])->name('parliamentary-parties.edit');
    Route::put('parliamentary-parties/{parliamentaryParty}', [ParliamentaryPartyController::class, 'update'])->name('parliamentary-parties.update');
    Route::delete('parliamentary-parties/{parliamentaryParty}', [ParliamentaryPartyController::class, 'destroy'])->name('parliamentary-parties.destroy');

    //meeting
    Route::get('meetings', [MeetingController::class, 'index'])->name('meetings.index');
    Route::post('meetings', [MeetingController::class, 'store'])->name('meetings.store');
    Route::get('meetings/{meeting}/edit', [MeetingController::class, 'edit'])->name('meetings.edit');
    Route::put('meetings/{meeting}', [MeetingController::class, 'update'])->name('meetings.update');
    Route::delete('meetings/{meeting}', [MeetingController::class, 'destroy'])->name('meetings.destroy');

    // Committee Routes
    Route::get('committees', [CommitteeController::class, 'index'])->name('committee.index');
    Route::get('committees/create', [CommitteeController::class, 'create'])->name('committee.create');
    Route::post('committees', [CommitteeController::class, 'store'])->name('committee.store');
    Route::get('committees/{committee}/general', [CommitteeController::class, 'general'])->name('committee.general');
    Route::put('committees/{committee}', [CommitteeController::class, 'update'])->name('committee.update');
    Route::get('committees/{committee}/about', [CommitteeController::class, 'showAboutForm'])->name('committee.show-about-form');
    Route::post('committees/{committee}/about', [CommitteeController::class, 'saveAbout'])->name('committee.save-about');
    Route::get('committees/{committee}/responsibility', [CommitteeController::class, 'showResponsibilityForm'])->name('committee.show-responsibility-form');
    Route::post('committees/{committee}/responsibility', [CommitteeController::class, 'saveResponsibility'])->name('committee.save-responsibility');

    // Committee Notices
    Route::get('committees/{committee}/notices', [CommitteeNoticecontroller::class, 'notices'])->name('committee.notices');
    Route::get('committees/{committee}/notices/create', [CommitteeNoticecontroller::class, 'createNoticeForm'])->name('committee.notices.create');
    Route::post('committees/{committee}/notices', [CommitteeNoticecontroller::class, 'storeNotice'])->name('committee.notices.store');
    Route::get('committees/{committee}/notices/{notice}/edit', [CommitteeNoticecontroller::class, 'editNotice'])->name('committee.notices.edit');
    Route::put('committees/{committee}/notices/{notice}', [CommitteeNoticecontroller::class, 'updateNotice'])->name('committee.notices.update');

    // Committee Activities
    Route::get('committees/{committee}/activities', [CommitteeActivitycontroller::class, 'activities'])->name('committee.activities');
    Route::get('committees/{committee}/activities/create', [CommitteeActivitycontroller::class, 'createActivityForm'])->name('committee.activities.create');
    Route::post('committees/{committee}/activities', [CommitteeActivitycontroller::class, 'storeActivity'])->name('committee.activities.store');
    Route::get('committees/{committee}/activities/{activity}/edit', [CommitteeActivitycontroller::class, 'editActivity'])->name('committee.activities.edit');
    Route::put('committees/{committee}/activities/{activity}', [CommitteeActivitycontroller::class, 'updateActivity'])->name('committee.activities.update');

    // Committee Downloads
    Route::get('committees/{committee}/downloads', [CommitteeDownloadController::class, 'downloads'])->name('committee.downloads');
    Route::get('committees/{committee}/downloads/create', [CommitteeDownloadController::class, 'createDownloadForm'])->name('committee.downloads.create');
    Route::get('committees/{committee}/downloads/{download}/edit', [CommitteeDownloadController::class, 'editDownload'])->name('committee.downloads.edit');
    Route::put('committees/{committee}/downloads/{download}', [CommitteeNoticecontroller::class, 'updateDownload'])->name('committee.downloads.update');

    // Committee Members
    Route::get('committees/{committee}/members', [CommitteeMemberController::class, 'members'])->name('committee.members');
    Route::get('committees/{committee}/members/create', [CommitteeMemberController::class, 'create'])->name('committee.members.create');
    Route::post('committees/{committee}/members', [CommitteeMemberController::class, 'store'])->name('committee.members.store');
    Route::get('committees/{committee}/members/{member}/edit', [CommitteeMemberController::class, 'edit'])->name('committee.members.edit');
    Route::put('committees/{committee}/members/{member}', [CommitteeMemberController::class, 'update'])->name('committee.members.update');

    // Downloads
    Route::post('downloads', [DownloadController::class, 'store'])->name('downloads.store');
    Route::put('downloads/{download}', [DownloadController::class, 'update'])->name('downloads.update');
    Route::delete('downloads/{download}', [DownloadController::class, 'destroy'])->name('downloads.destroy');

    // Gallery
    Route::get('albums', [AlbumController::class, 'index'])->name('album.index');
    Route::get('albums/getAlbums', [AlbumController::class, 'getAlbums']);
    Route::get('albums/create', [AlbumController::class, 'create'])->name('album.create');
    Route::post('albums', [AlbumController::class, 'store'])->name('album.store');
    Route::delete('albums/{album}', [AlbumController::class, 'destroy']);
    Route::get('album/{album}/photos', [PhotoController::class, 'index'])->name('album.photos.index');
    Route::get('album/{album}/getPhotos', [PhotoController::class, 'getPhotos']);
    Route::post('album/{album}/photos', [PhotoController::class, 'store'])->name('album.photos.store');
    Route::delete('photos/{photo}', [PhotoController::class, 'destroy']);

    //election year
    Route::get('elections', [ElectionController::class, 'index'])->name('elections.index');
    Route::post('elections', [ElectionController::class, 'store'])->name('elections.store');
    Route::get('elections/{election}/edit', [ElectionController::class, 'edit'])->name('elections.edit');
    Route::put('elections/{election}', [ElectionController::class, 'update'])->name('elections.update');
    Route::delete('elections/{election}', [ElectionController::class, 'destroy'])->name('elections.destroy');

    //members
    Route::get('members', [MemberController::class, 'index'])->name('members.index');
    Route::get('members/create', [MemberController::class, 'create'])->name('members.create');
    Route::put('members/sort', [MemberController::class, 'sort'])->name('members.sort');
    Route::get('members/search', [MemberController::class, 'search'])->name('members.search');
    Route::post('members', [MemberController::class, 'store'])->name('members.store');
    Route::get('members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::put('members/{member}', [MemberController::class, 'update'])->name('members.update');
    Route::delete('members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');

    //employee-designations
    Route::get('employee-designations', [EmployeeDesignationController::class, 'index'])->name('employee-designations.index');
    Route::post('employee-designations', [EmployeeDesignationController::class, 'store'])->name('employee-designations.store');
    Route::get('employee-designations/{employeeDesignation}/edit', [EmployeeDesignationController::class, 'edit'])->name('employee-designations.edit');
    Route::put('employee-designations/{employeeDesignation}', [EmployeeDesignationController::class, 'update'])->name('employee-designations.update');
    Route::delete('employee-designations/{employeeDesignation}', [EmployeeDesignationController::class, 'destroy'])->name('employee-designations.destroy');

    //employee
    Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::put('employees/sort', [EmployeeController::class, 'sort'])->name('employees.sort');
    Route::get('employees/search', [EmployeeController::class, 'search'])->name('employees.search');
    Route::post('employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

    //ministry
    Route::get('ministries', [MinistryController::class, 'index'])->name('ministries.index');
    Route::post('ministries', [MinistryController::class, 'store'])->name('ministries.store');
    Route::get('ministries/{ministry}/edit', [MinistryController::class, 'edit'])->name('ministries.edit');
    Route::put('ministries/{ministry}', [MinistryController::class, 'update'])->name('ministries.update');
    Route::delete('ministries/{ministry}', [MinistryController::class, 'destroy'])->name('ministries.destroy');

    //Bidhayak types
    Route::get('bill-categories', [BillCategoryController::class, 'index'])->name('bill-categories.index');
    Route::post('bill-categories', [BillCategoryController::class, 'store'])->name('bill-categories.store');
    Route::get('bill-categories/{billCategory}/edit', [BillCategoryController::class, 'edit'])->name('bill-categories.edit');
    Route::put('bill-categories/{billCategory}', [BillCategoryController::class, 'update'])->name('bill-categories.update');
    Route::delete('bill-categories/{billCategory}', [BillCategoryController::class, 'destroy'])->name('bill-categories.destroy');

    //bills
    Route::get('bills', [BillController::class, 'index'])->name('bills.index');
    Route::get('bills/create', [BillController::class, 'create'])->name('bills.create');
    Route::get('bills/search', [BillController::class, 'search'])->name('bills.search');
    Route::post('bills', [BillController::class, 'store'])->name('bills.store');
    Route::get('bills/{bill}/edit', [BillController::class, 'edit'])->name('bills.edit');
    Route::put('bills/{bill}', [BillController::class, 'update'])->name('bills.update');
    Route::delete('bills/{bill}', [BillController::class, 'destroy'])->name('bills.destroy');
    Route::get('bills/{bill}/entry-bill-file', [BillController::class, 'entryBillFile'])->name('bills.entryBillFile');
    Route::get('bills/{bill}/certification-bill-file', [BillController::class, 'certificationBillFile'])->name('bills.certificationBillFile');

    //bill-suggestions
    Route::get('bill-suggestions/{bill}/list', [BillSuggestionController::class, 'index'])->name('bill-suggestions.index');
    Route::get('bill-suggestions/{bill}/{billSuggestion}/show', [BillSuggestionController::class, 'show'])->name('bill-suggestions.show');
    Route::delete('bill-suggestions/{bill}/{billSuggestion}', [BillSuggestionController::class, 'destroy'])->name('bill-suggestions.destroy');

    //office-bearers
    Route::get('office-bearers', [OfficeBearerController::class, 'index'])->name('office-bearers.index');
    Route::post('office-bearers', [OfficeBearerController::class, 'store'])->name('office-bearers.store');
    Route::put('office-bearers/sort', [OfficeBearerController::class, 'sort'])->name('office-bearers.sort');
    Route::get('office-bearers/{officeBearer}/edit', [OfficeBearerController::class, 'edit'])->name('office-bearers.edit');
    Route::put('office-bearers/{officeBearer}', [OfficeBearerController::class, 'update'])->name('office-bearers.update');
    Route::delete('office-bearers/{officeBearer}', [OfficeBearerController::class, 'destroy'])->name('office-bearers.destroy');

    //information Officers
    Route::get('information-officers', [InformationOfficerController::class, 'index'])->name('information-officers.index');
    Route::post('information-officers', [InformationOfficerController::class, 'store'])->name('information-officers.store');
    Route::put('information-officers/sort', [InformationOfficerController::class, 'sort'])->name('information-officers.sort');
    Route::get('information-officers/{informationOfficer}/edit', [InformationOfficerController::class, 'edit'])->name('information-officers.edit');
    Route::put('information-officers/{informationOfficer}', [InformationOfficerController::class, 'update'])->name('information-officers.update');
    Route::delete('information-officers/{informationOfficer}', [InformationOfficerController::class, 'destroy'])->name('information-officers.destroy');

    //contact-us
    Route::get('contact-us', [ContactUsController::class, 'index'])->name('contact-us.index');
    Route::get('contact-us/{contactUs}', [ContactUsController::class, 'show'])->name('contact-us.show');
    Route::delete('contact-us/{contactUs}', [ContactUsController::class, 'destroy'])->name('contact-us.destroy');

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

    // //Fiscal year
    // Route::get('fiscal-year/{fiscalYear?}', [FiscalYearController::class, 'index'])->name('fiscal-year.index');
    // Route::post('fiscal-year', [FiscalYearController::class, 'store'])->name('fiscal-year.store');
    // Route::put('fiscal-year/{fiscalYear}', [FiscalYearController::class, 'update'])->name('fiscal-year.update');
    // Route::delete('fiscal-year/{fiscalYear}', [FiscalYearController::class, 'destroy'])->name('fiscal-year.destroy');

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
