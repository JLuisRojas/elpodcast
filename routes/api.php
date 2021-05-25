<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\SubscriptionController;

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
    Route::post('/{id}/podcast/{id_podcast}', [PodcastController::class, 'update']);
    Route::get('/{id}/podcast', [PodcastController::class, 'queryCreator']);
});

Route::prefix('/podcasts')->group(function() {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{id}', [CategoryController::class, 'get']);
    Route::get('/categories/{id}/pods', [PodcastController::class, 'queryCategory']);

    Route::post('/search', [PodcastController::class, 'queryPods']);

    Route::get('/recommended', [PodcastController::class, 'recomendedPodcasts']);

    Route::prefix('/{id}')->group(function() {
        Route::get('', [PodcastController::class, 'getPodcast']);
        Route::post('/episodes', [EpisodeController::class, 'store']);
        Route::get('/episodes', [EpisodeController::class, 'index']);
        Route::delete('/episodes/{ep_id}', [EpisodeController::class, 'destroy']);
        Route::get('/episodes/{ep_id}', [EpisodeController::class, 'get']);
        Route::post('/episodes/{ep_id}', [EpisodeController::class, 'update']);
    });
});

Route::prefix('/subscriptions')->group(function() {
    Route::get('/{user_id}', [SubscriptionController::class, 'get']);
    Route::get('/{user_id}/{pod_id}', [SubscriptionController::class, 'isSubscribed']);
    Route::post('/{user_id}/{pod_id}', [SubscriptionController::class, 'subscribe']);
    Route::delete('/{user_id}/{pod_id}', [SubscriptionController::class, 'unSubscribe']);
});
