<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\EpisodeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/creator')->group(function() {
    Route::post('/{id}', [UserController::class, 'becomeCreator']);
    Route::post('/{id}/podcast', [PodcastController::class, 'store']);
    Route::get('/{id}/podcast', [PodcastController::class, 'queryCreator']);
});

Route::prefix('/podcasts')->group(function() {
    Route::get('/categories', [CategoryController::class, 'index']);

    Route::prefix('/{id}')->group(function() {
        Route::get('', [PodcastController::class, 'getPodcast']);
        Route::post('/episodes', [EpisodeController::class, 'store']);
        Route::get('/episodes', [EpisodeController::class, 'index']);
        Route::delete('/episodes/{ep_id}', [EpisodeController::class, 'destroy']);
    });
});
