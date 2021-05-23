<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreatorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::get('/subscriptions', [App\Http\Controllers\HomeController::class, 'subscriptions'])->name('subscriptions');

Route::get('/podcast/{id}', [App\Http\Controllers\HomeController::class, 'podcast'])->name('podcast');

Route::prefix('/creator')->group(function() {
    Route::get('', [CreatorController::class, 'index'])->name('creator');
    Route::get('/newPodcast', [CreatorController::class, 'newPodcast']);

    Route::prefix('/podcast/{id}')->group(function() {
        Route::get('', [CreatorController::class, 'editPodcast']);
        Route::get('/episode', [CreatorController::class, 'newEpisode']);
        Route::get('/episode/{id_ep}', [CreatorController::class, 'editEpisode']);
        Route::get('/edit', [CreatorController::class, 'editPodcastInfo']);
    });
});
