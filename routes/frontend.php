<?php

use App\Http\Controllers\Frontend\CommitteeController;

Route::get('committees/{committee:slug}', [CommitteeController::class, 'show'])->name('frontend.committees.show');
Route::get('committees/{committee:slug}/responsibilities', [CommitteeController::class, 'responsibilities'])->name('frontend.committees.responsibilities');
Route::get('committees/{committee:slug}/notices', [CommitteeController::class, 'notices'])->name('frontend.committees.notices');
Route::get('committees/{committee:slug}/activities', [CommitteeController::class, 'activities'])->name('frontend.committees.activities');
Route::get('committees/{committee:slug}/downloads', [CommitteeController::class, 'downloads'])->name('frontend.committees.downloads');
Route::get('committees/{committee:slug}/members', [CommitteeController::class, 'members'])->name('frontend.committees.members');