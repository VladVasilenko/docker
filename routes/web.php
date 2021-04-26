<?php

use App\Http\Controllers\AuthSocial\SocialController;
use App\Http\Controllers\Profile\ProfileController;
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
Auth::routes();

Route::get('/social/callback', [SocialController::class, 'loginWith'])->name('SocialCall');
Route::get('/social', [SocialController::class, 'redirect'])->name('SocialAuth');

Route::middleware(['only.user'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::middleware(['only.admin'])->prefix('dashboard')->group(function () {
    Route::get('/', function () {
        dd('admin');
    })->name('dashboard.index');
});
Route::middleware(['only.user'])->prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index'] )->name('user.index');
    Route::get('/get_bonus', [ProfileController::class, 'setBonus'] )->name('user.setBonus');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
