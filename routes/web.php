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

Route::get('/social/callback', [SocialController::class, 'loginWith'])->name('SocialCall');
Route::get('/social', [SocialController::class, 'redirect'])->name('SocialAuth');

Route::get('/', function (){
    return 'index';
});

Route::middleware(['web'])->prefix('dashboard')->group(function () {
    Route::get('/', function () {
        dd('admin');
    })->name('dashboard.index');
});
Route::middleware(['web'])->prefix('profile')->group(function () {
    Route::get('/', function () {
        dd('user');
    })->name('user.index');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
