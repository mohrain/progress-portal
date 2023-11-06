<?php

use App\Http\Controllers\Frontend\CommitteeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LiveController;
use App\Http\Controllers\VideoGalleryController;

Route::get('committees/{committee:slug}', [CommitteeController::class, 'show'])->name('frontend.committees.show');
Route::get('committees/{committee:slug}/responsibilities', [CommitteeController::class, 'responsibilities'])->name('frontend.committees.responsibilities');
Route::get('committees/{committee:slug}/notices', [CommitteeController::class, 'notices'])->name('frontend.committees.notices');
Route::get('committees/{committee:slug}/activities', [CommitteeController::class, 'activities'])->name('frontend.committees.activities');
Route::get('committees/{committee:slug}/downloads', [CommitteeController::class, 'downloads'])->name('frontend.committees.downloads');
Route::get('committees/{committee:slug}/members', [CommitteeController::class, 'members'])->name('frontend.committees.members');

Route::get('gallery', [GalleryController::class, 'index']);
Route::get('gallery/{album}/photos', [GalleryController::class, 'show']);
Route::get('gallery/getAlbums', [GalleryController::class, 'getAlbums']);
Route::get('gallery/{album}/getPhotos', [GalleryController::class, 'getPhotos']);

Route::get('videos', [VideoGalleryController::class, 'index']);

Route::get('live', [LiveController::class, 'frontend'])->name('frontend.live');
