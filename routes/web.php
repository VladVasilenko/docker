<?php

use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Laravel\Socialite\Facades\Socialite;

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

Route::prefix('dashboard')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', function () {
            return 'admin';
        });
    });
});
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        dd(auth()->user());
        return 'user';

    });
});


Route::get('/auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('/auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
