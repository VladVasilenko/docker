<?php

use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('api_token')->get('/users/{api_token}',
    [ApiController::class, 'getUsers'] )->name('api.getUsers');



//Route::get('/example/{api_token}/{name}', function (Request $request) {
//    return response()->json([
//        'name' => $request->name,
//    ]);
//})->middleware('api_token');

