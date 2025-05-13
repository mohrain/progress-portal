<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Berkayk\OneSignal\OneSignalFacade;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LiveController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SuchiController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\BillTypeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MinistryController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\SuchiTypeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FiscalYearController;
use App\Http\Controllers\ModalImageController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\BillCategoryController;
use App\Http\Controllers\OfficeBearerController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\CarouselImageController;
use App\Http\Controllers\BillSuggestionController;
use App\Http\Controllers\CommitteeVideoController;
use App\Http\Controllers\CommitteeMemberController;
use App\Http\Controllers\CommitteeNoticecontroller;
use App\Http\Controllers\DepartmentAudioController;
use App\Http\Controllers\DepartmentVideoController;
use App\Http\Controllers\FederalparlimentController;
use App\Http\Controllers\PostCategoryMenuController;
use App\Http\Controllers\CommitteeActivitycontroller;
use App\Http\Controllers\CommitteeDownloadController;
use App\Http\Controllers\CommitteeDownloadsController;
use App\Http\Controllers\CommitteeSecretaryController;
use App\Http\Controllers\DepartmentActivityController;
use App\Http\Controllers\InformationOfficerController;
use App\Http\Controllers\ParliamentaryPartyController;
use App\Http\Controllers\EmployeeDesignationController;
use App\Http\Controllers\DepartmentPublicationController;
use App\Http\Controllers\FrequentlyAskedQuestionController;
use App\Http\Controllers\CurrentParliamentaryPartyController;
use App\Http\Controllers\EmployeeTypeController;
use App\Http\Controllers\MeetingTypeController;
use App\Http\Controllers\OfficeBearerDesignationController;
use App\Http\Controllers\PageDisplayController;
use App\Http\Controllers\PrimaryCategoryMenuController;
use App\Http\Controllers\ProvincialAssemblyLibraryController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\WardController;
use App\Models\Rank;
use App\Post;

Route::get("notify", function () {
    Route::get('/', function () {
        OneSignalFacade::sendNotificationToAll(
            "Test message is for the  notification",
            $url = null,
            $data = null,
            $buttons = null,
            $schedule = null
        );
    });
});
// Auth::routes(['register' => false]);
Route::get('login', [LoginController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');

Route::post('login', [LoginController::class, 'login'])->name('login.post');
Route::post('logout', LogoutController::class)->name('logout');

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('pages/{page}', [PageController::class, 'show'])->name('pages.show');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('posts/{postCategory}/search', [PostController::class, 'frontendSearch'])->name('posts.frontendSearch');
Route::get('post-categories/{postCategory}', [PostCategoryController::class, 'show'])->name('post-categories.show');
Route::get('faqs', [FrequentlyAskedQuestionController::class, 'frontend'])->name('faq.frontend');
Route::get('parliamentary-parties', [ParliamentaryPartyController::class, 'frontend'])->name('parliamentary-parties.frontend');
Route::get('bill-types/{billType}', [BillTypeController::class, 'show'])->name('bill-types.show');
Route::get('bill-types/{billType}/search', [BillController::class, 'frontendSearch'])->name('bills.frontendSearch');
Route::get('bills/{bill}', [BillController::class, 'show'])->name('bills.show');
Route::post('bills-mark-draft/{bill}', [BillController::class, 'markDraft'])->name('bills.mark-draft');
Route::post('bills-mark-publish/{bill}', [BillController::class, 'markPublish'])->name('bills.mark-publish');

Route::get('bill-suggestions/{bill}', [BillSuggestionController::class, 'create'])->name('bill-suggestions.create');
Route::post('bill-suggestions/{bill}', [BillSuggestionController::class, 'store'])->name('bill-suggestions.store');
Route::get('members', [MemberController::class, 'frontendIndex'])->name('members.frontendIndex');
Route::get('members/search', [MemberController::class, 'frontendSearch'])->name('members.frontendSearch');
Route::get('members/old-member', [MemberController::class, 'frontendIndexOld'])->name('members.frontendIndexOld');
Route::get('members/old-member/search', [MemberController::class, 'frontendOldSearch'])->name('members.frontendOldSearch');
Route::get('members/{member}', [MemberController::class, 'show'])->name('members.show');
Route::get('employees', [EmployeeController::class, 'frontendIndex'])->name('employees.frontendIndex');
Route::get('employees/old', [EmployeeController::class, 'frontendIndexOld'])->name('employees.frontendIndexOld');
Route::get('employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
Route::get('employees/frontend/search', [EmployeeController::class, 'frontendSearch'])->name('employees.frontendSearch');
Route::get('employees/frontend/search/old', [EmployeeController::class, 'frontendSearchOld'])->name('employees.frontendSearchOld');
Route::get('office-bearers', [OfficeBearerController::class, 'frontendIndex'])->name('office-bearers.frontendIndex');
Route::get('office-bearers/old', [OfficeBearerController::class, 'frontendIndexOld'])->name('office-bearers.frontendIndexOld');
Route::get('contact-us', [ContactUsController::class, 'create'])->name('contact-us.create');
Route::post('contact-us', [ContactUsController::class, 'store'])->name('contact-us.store');
Route::get('current-parliamentary-parties', [CurrentParliamentaryPartyController::class, 'frontendIndex'])->name('current-parliamentary-parties.frontendIndex');

Route::get('apply', [FrontendController::class, 'showApplicationForm']);
Route::post('suchi', [SuchiController::class, 'store']);
Route::get('application-submitted/{suchi}', [FrontendController::class, 'applicationSubmitted']);
Route::get('token-search', [FrontendController::class, 'tokenSearch']);

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('/prdesh-shava-news', [PageDisplayController::class, 'News'])->name('prdesh-shava-news');
Route::get('/prdesh-shava-downloads', [PageDisplayController::class, 'Downloads'])->name('prdesh-shava-downloads');
Route::get('/pradesh-shava', [PageDisplayController::class, 'pradeshShava'])->name('pradesh-shava');
Route::get('/sadeshya', [PageDisplayController::class, 'Members'])->name('sadeshya');
Route::get('/samiti', [PageDisplayController::class, 'Samiti'])->name('samiti');

// Route::get('/pradesh-shava', function () {
//     return view('frontend.mobile.pradesh-shava');
// })->name('pradesh-shava');
Route::get('language/{locale}', [LanguageController::class, 'setLocale'])->name('locale');
// Route::get('set-active-fiscal-year/{fiscalYear}', 'MiscController@setActiveFiscalYear')->name('set-active-fiscal-year');

Route::get('provincial-assembly-library', [ProvincialAssemblyLibraryController::class, 'frontendIndex'])->name('provincial-assembly-library.frontendIndex');
Route::get('provincial-assembly-library/{provincialAssemblyLibrary}', [ProvincialAssemblyLibraryController::class, 'show'])->name('provincial-assembly-library.show');



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
    Route::get('documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');

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
    Route::get('/switch-committee-secretary/{committeeSecretary}', [CommitteeController::class, 'switchCommitteeSecretary'])->name('committee.switch');
    Route::get('/switch-department/{department}', [DepartmentController::class, 'switchDepartment'])->name('department.switch');

    Route::get('committees', [CommitteeController::class, 'index'])->name('committee.index');
    Route::get('committees/create', [CommitteeController::class, 'create'])->name('committee.create');
    Route::post('committees', [CommitteeController::class, 'store'])->name('committee.store');
    Route::get('committees/{committee}/general', [CommitteeController::class, 'general'])->name('committee.general');
    Route::put('committees/{committee}', [CommitteeController::class, 'update'])->name('committee.update');
    Route::get('committees/{committee}/about', [CommitteeController::class, 'showAboutForm'])->name('committee.show-about-form');
    Route::post('committees/{committee}/about', [CommitteeController::class, 'saveAbout'])->name('committee.save-about');
    Route::get('committees/{committee}/responsibility', [CommitteeController::class, 'showResponsibilityForm'])->name('committee.show-responsibility-form');
    Route::post('committees/{committee}/responsibility', [CommitteeController::class, 'saveResponsibility'])->name('committee.save-responsibility');
    Route::delete('committees/{committee}', [CommitteeController::class, 'delete'])->name('committee.destroy');

    // Committee Notices
    Route::get('committees/{committee}/notices', [CommitteeNoticecontroller::class, 'notices'])->name('committee.notices');
    Route::get('committees/{committee}/notices/create', [CommitteeNoticecontroller::class, 'createNoticeForm'])->name('committee.notices.create');
    Route::post('committees/{committee}/notices', [CommitteeNoticecontroller::class, 'storeNotice'])->name('committee.notices.store');
    Route::get('committees/{committee}/notices/{notice}/edit', [CommitteeNoticecontroller::class, 'editNotice'])->name('committee.notices.edit');
    Route::put('committees/{committee}/notices/{notice}', [CommitteeNoticecontroller::class, 'updateNotice'])->name('committee.notices.update');
    Route::delete('committees/{committee}/notices/{notice}', [CommitteeNoticecontroller::class, 'destroy'])->name('committee.notices.destroy');
    Route::get('committees/{committee}/notices/{notice}/sms', [CommitteeNoticecontroller::class, 'sms'])->name('committee.notices.sms');

    // Committee Activities
    Route::get('committees/{committee}/activities', [CommitteeActivitycontroller::class, 'activities'])->name('committee.activities');
    Route::get('committees/{committee}/activities/create', [CommitteeActivitycontroller::class, 'createActivityForm'])->name('committee.activities.create');
    Route::post('committees/{committee}/activities', [CommitteeActivitycontroller::class, 'storeActivity'])->name('committee.activities.store');
    Route::get('committees/{committee}/activities/{activity}/edit', [CommitteeActivitycontroller::class, 'editActivity'])->name('committee.activities.edit');
    Route::put('committees/{committee}/activities/{activity}', [CommitteeActivitycontroller::class, 'updateActivity'])->name('committee.activities.update');
    Route::delete('committees/{committee}/activities/{activity}', [CommitteeActivitycontroller::class, 'destroy'])->name('committee.activities.destroy');

    // Committee Downloads
    Route::get('committees/{committee}/downloads', [CommitteeDownloadController::class, 'downloads'])->name('committee.downloads');
    Route::get('committees/{committee}/downloads/create', [CommitteeDownloadController::class, 'createDownloadForm'])->name('committee.downloads.create');
    Route::get('committees/{committee}/downloads/{download}/edit', [CommitteeDownloadController::class, 'editDownload'])->name('committee.downloads.edit');
    Route::put('committees/{committee}/downloads/{download}', [CommitteeNoticecontroller::class, 'updateDownload'])->name('committee.downloads.update');
    Route::delete('committees/{committee}/downloads/{download}', [CommitteeNoticecontroller::class, 'destroy'])->name('committee.downloads.destroy');

    // Committee Members
    Route::get('committees/{committee}/members', [CommitteeMemberController::class, 'members'])->name('committee.members');
    Route::get('committees/{committee}/members/create', [CommitteeMemberController::class, 'create'])->name('committee.members.create');
    Route::post('committees/{committee}/members', [CommitteeMemberController::class, 'store'])->name('committee.members.store');
    Route::get('committees/{committee}/members/{member}/edit', [CommitteeMemberController::class, 'edit'])->name('committee.members.edit');
    Route::put('committees/{committee}/members/{member}', [CommitteeMemberController::class, 'update'])->name('committee.members.update');
    Route::delete('committees/{committee}/members/{member}', [CommitteeMemberController::class, 'destroy'])->name('committee.members.destroy');

    // Committee Members
    Route::get('committees/{committee}/secretary', [CommitteeSecretaryController::class, 'secretary'])->name('committee.secretary');
    Route::post('committees/{committee}/secretary', [CommitteeSecretaryController::class, 'store'])->name('committee.secretary.store');
    Route::delete('committees/{committee}/secretary/{committeeSecretary}', [CommitteeSecretaryController::class, 'destroy'])->name('committee.secretary.destroy');

    Route::get('committees/{committee}/audio', [CommitteeSecretaryController::class, 'audio'])->name('committee.audio');
    Route::get('committees/{committee}/audio/create', [CommitteeSecretaryController::class, 'audioCreate'])->name('committee.audio.create');
    Route::post('committees/{committee}/audio/store', [CommitteeSecretaryController::class, 'audioStore'])->name('committee.store.audio');
    Route::get('committees/{committee}/audio/{audio}', [CommitteeSecretaryController::class, 'audioEdit'])->name('committee.edit.audio');
    Route::put('committees/{committee}/audio/{audio}/update', [CommitteeSecretaryController::class, 'audioUpdate'])->name('committee.update.audio');
    Route::delete('committees/audio/{audio}/delete', [CommitteeSecretaryController::class, 'audioDelete'])->name('committee.delete.audio');

    Route::get('committees/{committee}/video', [CommitteeVideoController::class, 'index'])->name('committee.video.index');
    Route::get('committees/{committee}/video/create', [CommitteeVideoController::class, 'videoCreate'])->name('committee.video.create');
    Route::post('committees/{committee}/video/store', [CommitteeVideoController::class, 'videoStore'])->name('committee.store.video');
    Route::get('committees/{committee}/video/{video}', [CommitteeVideoController::class, 'videoEdit'])->name('committee.edit.video');
    Route::put('committees/{committee}/video/{video}/update', [CommitteeVideoController::class, 'videoUpdate'])->name('committee.update.video');
    Route::delete('committees/video/{video}/delete', [CommitteeVideoController::class, 'videoDelete'])->name('committee.delete.video');



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

    // Video Gallery
    Route::get('videos', [VideoController::class, 'index'])->name('videos.index');
    Route::get('videos/create', [VideoController::class, 'create'])->name('videos.create');
    Route::post('videos', [VideoController::class, 'store'])->name('videos.store');
    Route::get('videos/{video}/edit', [VideoController::class, 'edit'])->name('videos.edit');
    Route::post('videos/{video}', [VideoController::class, 'update'])->name('videos.update');
    Route::delete('videos/{video}', [VideoController::class, 'destroy'])->name('videos.destroy');

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

    Route::get('employees/{id}/get', [EmployeeController::class, 'getData'])->name('employees.getData');

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
    Route::get('bills/{bill}/print', [BillController::class, 'print'])->name('bills.print');

    //bill-suggestions
    Route::get('bill-suggestions/{bill}/list', [BillSuggestionController::class, 'index'])->name('bill-suggestions.index');
    Route::get('bill-suggestions/{bill}/{billSuggestion}/show', [BillSuggestionController::class, 'show'])->name('bill-suggestions.show');
    Route::get('bill-suggestions/{bill}/{billSuggestion}/print', [BillSuggestionController::class, 'print'])->name('bill-suggestions.print');
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

    //current-parliamentary-parties
    Route::get('current-parliamentary-parties', [CurrentParliamentaryPartyController::class, 'index'])->name('current-parliamentary-parties.index');
    Route::post('current-parliamentary-parties', [CurrentParliamentaryPartyController::class, 'store'])->name('current-parliamentary-parties.store');
    Route::put('current-parliamentary-parties/sort', [CurrentParliamentaryPartyController::class, 'sort'])->name('current-parliamentary-parties.sort');
    Route::get('current-parliamentary-parties/{currentParliamentaryParty}/edit', [CurrentParliamentaryPartyController::class, 'edit'])->name('current-parliamentary-parties.edit');
    Route::put('current-parliamentary-parties/{currentParliamentaryParty}', [CurrentParliamentaryPartyController::class, 'update'])->name('current-parliamentary-parties.update');
    Route::delete('current-parliamentary-parties/{currentParliamentaryParty}', [CurrentParliamentaryPartyController::class, 'destroy'])->name('current-parliamentary-parties.destroy');

    //live
    Route::get('live', [LiveController::class, 'index'])->name('live.index');

    //sms
    Route::get('sms', [SmsController::class, 'index'])->name('sms.index');
    Route::post('sms', [SmsController::class, 'store'])->name('sms.store');

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
    Route::resource('bearer-designations', OfficeBearerDesignationController::class);
    Route::resource('ranks', RankController::class);
    Route::resource('employee-types', EmployeeTypeController::class);
    Route::resource('meeting-types', MeetingTypeController::class);
    // Route::resource('primary-menus', PrimaryCategoryMenuController::class);
    Route::get('primary-menus', [PrimaryCategoryMenuController::class, 'index'])->name('primary-menus.index');
    Route::get('primary-menus/store', [PrimaryCategoryMenuController::class, 'store'])->name('primary-menus.store');
    Route::put('primary-menus/sort', [PrimaryCategoryMenuController::class, 'sort'])->name('primary-menus.sort');
    Route::delete('primary-menus/remove-item', [PrimaryCategoryMenuController::class, 'removeItem'])->name('primary-menus.remove-item');

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

    //ProvincialAssemblyLibrary
    Route::get('provincial-assembly-library', [ProvincialAssemblyLibraryController::class, 'index'])->name('provincial-assembly-library.index');
    Route::get('provincial-assembly-library/create', [ProvincialAssemblyLibraryController::class, 'create'])->name('provincial-assembly-library.create');
    Route::post('provincial-assembly-library', [ProvincialAssemblyLibraryController::class, 'store'])->name('provincial-assembly-library.store');
    Route::get('provincial-assembly-library/{provincialAssemblyLibrary}/edit', [ProvincialAssemblyLibraryController::class, 'edit'])->name('provincial-assembly-library.edit');
    Route::put('provincial-assembly-library/{provincialAssemblyLibrary}', [ProvincialAssemblyLibraryController::class, 'update'])->name('provincial-assembly-library.update');
    Route::delete('provincial-assembly-library/{provincialAssemblyLibrary}', [ProvincialAssemblyLibraryController::class, 'destroy'])->name('provincial-assembly-library.destroy');

    Route::get('departments/list', [DepartmentController::class, 'list'])->name('department.list');
    Route::get('departments/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::delete('departments/{slug}/delete', [DepartmentController::class, 'deleteDepartment'])->name('department.delete');
    Route::get('departments/{slug}/view', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::put('departments/{id}/update', [DepartmentController::class, 'update'])->name('department.update');
    Route::get('departments/{slug}/work-duty-authority', [DepartmentController::class, 'duty'])->name('department.duty');
    Route::put('departments/{id}/work-duty-authority/update', [DepartmentController::class, 'workUpdate'])->name('department.work.update');
    Route::get('departments/{slug}/notices', [DepartmentController::class, 'notices'])->name('department.notices');
    Route::get('departments/{slug}/notices/create', [DepartmentController::class, 'noticesCreate'])->name('department.notices.create');
    Route::get('departments/{slug}/activities', [DepartmentController::class, 'activity'])->name('department.activity');
    Route::get('departments/{slug}/activities/create', [DepartmentController::class, 'activityCreate'])->name('department.activity.create');
    Route::get('departments/{slug}/publications', [DepartmentController::class, 'publications'])->name('department.publications');
    Route::get('departments/{slug}/publications/create', [DepartmentController::class, 'publicationsCreate'])->name('department.publications.create');
    Route::get('departments/{slug}/{id}/publications/edit', [DepartmentController::class, 'publicationsedit'])->name('department.publications.edit');
    Route::put('departments/{slug}/{id}/publications/update', [DepartmentController::class, 'publicationsupdate'])->name('department.publications.update');
    Route::get('departments/{slug}/audio', [DepartmentController::class, 'media'])->name('department.media');
    Route::get('departments/{slug}/video', [DepartmentController::class, 'video'])->name('department.video');
    Route::get('departments/branch', [DepartmentController::class, 'branch'])->name('department.branch');
    Route::get('sub-departments/{departmentSlug}', [DepartmentController::class, 'subdepartment'])->name('department.subdepartment');

    Route::get('departments/{slug}/head-of-department', [DepartmentController::class, 'hod'])->name('department.hod');
    Route::post('departments/{id}/head-of-department/update', [DepartmentController::class, 'hodStore'])->name('department.hodStore');
    Route::delete('departments/{slug}/secretary/{id}', [DepartmentController::class, 'hodDestroy'])->name('department.hodDestroy');


    Route::post('information/store', [InformationController::class, 'store'])->name('information.store');
    Route::get('departments/{slug}/notices/{id}/edit', [InformationController::class, 'edit'])->name('information.edit');
    Route::put('departments/{slug}/notices/{id}/update', [InformationController::class, 'update'])->name('information.update');
    Route::delete('departments/{id}/delete/information', [InformationController::class, 'delete'])->name('information.delete');

    Route::post('department/activity/store', [DepartmentActivityController::class, 'store'])->name('department.activity.store');
    Route::get('departments/activity/{slug}/{id}/edit', [DepartmentActivityController::class, 'edit'])->name('department.activity.edit');
    Route::put('departments/activity/{slug}/{id}/update', [DepartmentActivityController::class, 'update'])->name('department.activity.update');
    Route::delete('departments/activity/{id}/delete', [DepartmentActivityController::class, 'delete'])->name('department.activity.delete');

    Route::post('department/publicationstore', [DepartmentPublicationController::class, 'store'])->name('department.publication.store');
    Route::get('departments/publication{slug}{id}/edit', [DepartmentPublicationController::class, 'edit'])->name('department.publication.edit');
    Route::put('departments/publication{slug}/{id}/update', [DepartmentPublicationController::class, 'update'])->name('department.publication.update');
    Route::delete('departments/activity/{id}/delete/department', [DepartmentPublicationController::class, 'delete'])->name('department.publication.delete');

    Route::post('department/{slug}/media', [DepartmentAudioController::class, 'store'])->name('media.store');
    Route::delete('department/{slug}/media/{id}/delete', [DepartmentAudioController::class, 'delete'])->name('media.delete');
    Route::post('department/{slug}/video', [DepartmentVideoController::class, 'store'])->name('video.store');
    Route::delete('department/{slug}/video/{id}/delete', [DepartmentVideoController::class, 'delete'])->name('video.delete');

    Route::get('employee/status/{id}', [EmployeeController::class, 'changeStatus'])->name('employee.status');

    Route::get('federal-parliament-secretariat', [FederalparlimentController::class, 'index'])->name('federal.index');
    Route::post('federal-parliament-secretariat', [FederalparlimentController::class, 'store'])->name('federal.store');


    // ward

    Route::get('wards/list', [WardController::class, 'list'])->name('ward.list');
    Route::get('wards/create', [WardController::class, 'create'])->name('ward.create');
    Route::delete('wards/{slug}/delete', [WardController::class, 'deleteWard'])->name('ward.delete');
    Route::get('wards/{slug}/view', [WardController::class, 'edit'])->name('ward.edit');
    Route::put('wards/{ward}/update', [WardController::class, 'update'])->name('ward.update');

    Route::get('wards/{ward}/work-duty-authority', [WardController::class, 'duty'])->name('ward.duty');
    Route::put('wards/{ward}/work-duty-authority/update', [WardController::class, 'workUpdate'])->name('ward.work.update');

    Route::get('wards/{ward}/notices', [WardController::class, 'notices'])->name('ward.notices');
    Route::get('wards/{ward}/notices/create', [WardController::class, 'noticesCreate'])->name('ward.notices.create');
    Route::post('wards/{ward}/notices/store', [WardController::class, 'storeNotices'])->name('ward.notices.store');
    Route::get('wards/{ward}/members', [WardController::class, 'members'])->name('ward.members');

    Route::get('wards/{slug}/activities', [WardController::class, 'activity'])->name('ward.activity');
    Route::get('wards/{slug}/activities/create', [WardController::class, 'activityCreate'])->name('ward.activity.create');

    Route::get('wards/{slug}/publications', [WardController::class, 'publications'])->name('ward.publications');
    Route::get('wards/{slug}/publications/create', [WardController::class, 'publicationsCreate'])->name('ward.publications.create');
    Route::get('wards/{slug}/{id}/publications/edit', [WardController::class, 'publicationsedit'])->name('ward.publications.edit');
    Route::put('wards/{slug}/{id}/publications/update', [WardController::class, 'publicationsupdate'])->name('ward.publications.update');

    Route::get('wards/{slug}/audio', [WardController::class, 'media'])->name('ward.media');
    Route::get('wards/{slug}/video', [WardController::class, 'video'])->name('ward.video');

    Route::get('wards/branch', [WardController::class, 'branch'])->name('ward.branch');
    Route::get('sub-wards/{wardSlug}', [WardController::class, 'subward'])->name('ward.subward');
});
Route::get('departments', [DepartmentController::class, 'index'])->name('department.index');
Route::post('departments', [DepartmentController::class, 'store'])->name('department.store');
Route::get('all-employees', [DepartmentController::class, 'allStaffs'])->name('allStaff');
Route::get('employees/{slug}', [DepartmentController::class, 'staffShow'])->name('staffShow');
Route::get('departments/{slug}', [DepartmentController::class, 'introFront'])->name('department.introFront');
Route::get('departments/{slug}/work-duty-authority', [DepartmentController::class, 'workFront'])->name('department.workFront');
Route::get('departments/{slug}/notices', [DepartmentController::class, 'noticeFront'])->name('department.noticeFront');
Route::get('departments/{slug}/notices/filter', [DepartmentController::class, 'noticeFilter'])->name('department.noticeFilter');
Route::get('departments/{slug}/notices/{id}/detail', [InformationController::class, 'detail'])->name('information.detail');
Route::get('departments/{slug}/activities', [DepartmentActivityController::class, 'activiityFront'])->name('department.activiityFront');
Route::get('departments/{slug}/activity/{id}/detail', [DepartmentActivityController::class, 'detail'])->name('activity.detail');
Route::get('departments/{slug}/publication', [DepartmentPublicationController::class, 'publicationFront'])->name('department.publicationFront');
Route::get('departments/{slug}/publication/{id}/detail', [DepartmentPublicationController::class, 'detail'])->name('publication.detail');
Route::get('departments/{slug}/audio', [DepartmentAudioController::class, 'audioFront'])->name('department.audioFront');
Route::get('departments/{slug}/video', [DepartmentVideoController::class, 'videoFront'])->name('department.videoFront');
Route::get('download/{file}', [DownloadController::class, 'footerDownload'])->name('footerDownload');


Route::get('/api/post-categories', [PostCategoryController::class, 'postCategories']);
Route::get('/api/primary-menus', [PrimaryCategoryMenuController::class, 'primaryMenus']);
Route::get('/api/posts', [PostController::class, 'getPostByCategory']);
// Suchi Print
//   Route::get('suchi-print-application/{suchi}', [SuchiPrintController::class, 'index'])->name('suchi-print-application');
//   Route::get('suchi-print-certificate/{suchi}', [SuchiPrintController::class, 'certificate'])->name('suchi-print-certificate')->middleware('auth');

// Logs
Route::group(['middleware' => ['auth', 'role:super-admin']], function () {
    Route::get('admin/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('admin.logs');
});
