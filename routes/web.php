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
    Route::middleware(['only.admin'])->group(function () {
        Route::get('/', function () {
            return dd('admin');
        });
    });
});
Route::middleware(['only.user'])->group(function () {
    Route::get('/', function () {
        return dd('user');
    });
});


Route::get('/auth/social', [SocialController::class, 'redirect'])->name('SocialAuth');
Route::get('/auth/social/callback', [SocialController::class, 'loginWith']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
