<?php

use App\Http\Controllers\WardController;
use App\Http\Controllers\WardDownloadController;
use App\Http\Controllers\WardEmployeeController;
use App\Http\Controllers\WardMediaController;
use App\Http\Controllers\WardRecomendationController;
use App\Http\Controllers\WardSecretaryController;
use App\Http\Controllers\WardTaxController;
use App\Models\WardRecomendation;
use App\Ward;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {

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
    Route::get('wards/{ward}/secretary', [WardSecretaryController::class, 'wardSecratary'])->name('ward.secretary');
    Route::post('wards/{ward}/secretary/store', [WardSecretaryController::class, 'StoreWardSecretary'])->name('ward.secretary.store');
    Route::delete('wards/{ward}/secretary/delete', [WardSecretaryController::class, 'destroy'])->name('ward.secretary.destroy');

    Route::get('wards/{ward}/downloads', [WardDownloadController::class, 'downloads'])->name('ward.downloads');
    Route::get('wards/{ward}/downloads/create', [WardDownloadController::class, 'downloadsCreate'])->name('ward.downloads.create');
    Route::get('wards/{ward}/{id}/downloads/edit', [WardDownloadController::class, 'downloadsEdit'])->name('ward.downloads.edit');
    Route::put('wards/{ward}/{id}/downloads/update', [WardDownloadController::class, 'downloadsUpdate'])->name('ward.downloads.update');

    Route::get('wards/{ward}/audio', [WardController::class, 'media'])->name('ward.media');
    Route::get('wards/{ward}/video', [WardController::class, 'video'])->name('ward.video');

    Route::get('wards/{ward}/audio', [WardMediaController::class, 'audio'])->name('ward.audio');
    Route::get('wards/{ward}/audio/create', [WardMediaController::class, 'audioCreate'])->name('ward.audio.create');
    Route::post('wards/{ward}/audio/store', [WardMediaController::class, 'audioStore'])->name('ward.audio.store');
    Route::get('wards/{ward}/audio/{audio}', [WardMediaController::class, 'audioEdit'])->name('ward.audio.edit');
    Route::put('wards/{ward}/audio/{audio}/update', [WardMediaController::class, 'audioUpdate'])->name('ward.audio.update');
    Route::delete('wards/audio/{audio}/delete', [WardMediaController::class, 'audioDelete'])->name('ward.audio.delete');

    Route::get('wards/{ward}/video', [WardMediaController::class, 'index'])->name('ward.video');
    Route::get('wards/{ward}/video/create', [WardMediaController::class, 'videoCreate'])->name('ward.video.create');
    Route::post('wards/{ward}/video/store', [WardMediaController::class, 'videoStore'])->name('ward.video.store');
    Route::get('wards/{ward}/video/{video}', [WardMediaController::class, 'videoEdit'])->name('ward.video.edit');
    Route::put('wards/{ward}/video/{video}/update', [WardMediaController::class, 'videoUpdate'])->name('ward.video.update');
    Route::delete('wards/video/{video}/delete', [WardMediaController::class, 'videoDelete'])->name('ward.video.delete');


    // ward Employees
    Route::get('wards/{ward}/employees', [WardEmployeeController::class, 'index'])->name('ward.employees');
    Route::post('wards/{ward}/employees/store', [WardEmployeeController::class, 'store'])->name('ward.employees.store');
    Route::put('wards/{wardEmployee}/update', [WardEmployeeController::class, 'update'])->name('ward.employees.update');
    Route::get('wards/{ward}/employees/{wardEmployee}/edit', [WardEmployeeController::class, 'edit'])->name('ward.employees.edit');
    Route::delete('wards/{wardEmployee}/employees/destroy', [WardEmployeeController::class, 'destroy'])->name('ward.employees.destroy');

    Route::get('/ward-recommendations/get', [WardRecomendationController::class, 'getRecommendations'])
        ->name('ward-recommendations.get');

    // Ward Recommendations
    Route::resource('ward-recomendations', WardRecomendationController::class);
    Route::resource('ward-taxes', WardTaxController::class);
    Route::get('get-ward-taxes', [WardTaxController::class, 'getWardTaxes'])->name('ward-taxes.get');
    Route::get('/api/ward-taxes', [WardTaxController::class, 'wardTaxesByMonth']);
    Route::get('/api/ward-recomendations', [WardRecomendationController::class, 'getWardRecomendationsByMonth']);
});
