<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PodcastController;

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
});

Route::prefix('/podcasts')->group(function() {
    Route::get('/categories', [CategoryController::class, 'index']);
});
