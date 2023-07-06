<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\TwitterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'social-media'], function () {

    // Route::apiResource('posts', SocialMediaController::class);
    Route::post('post/create', [FacebookController::class, 'createPost'])->name('createPost');
    // Route::post('twitter-connect', [TwitterController::class, 'twitterConnect'])->name('twitter-connect');
    // Route::get('get-post', [TwitterController::class, 'getPost'])->name('get-post');
});
