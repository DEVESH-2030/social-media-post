<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// route to show the login form

Route::get('login', array(
    'uses' => 'MainController@showLogin'
));

// route to process the form

Route::post('login', array(
    'uses' => 'MainController@doLogin'
));
Route::get('logout', array(
    'uses' => 'MainController@doLogout'
));
Route::get(
    '/',
    function () {
        return view('welcome');
    }
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'social-media'], function () {

    // Route::apiResource('posts', SocialMediaController::class);
    Route::post('post/create', [FacebookController::class, 'createPost'])->name('createPost');

    Route::get('/', [App\Http\Controllers\TwitterController::class, 'getPost'])->name('/');
    Route::get('twitter-connect', [App\Http\Controllers\TwitterController::class, 'twitterConnect'])->name('twitter-connect');
    Route::get('twitter-cbk', [App\Http\Controllers\TwitterController::class, 'twitterCBK'])->name('twitter-cbk');
});
