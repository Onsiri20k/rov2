<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\RplActivityController;
use App\Http\Controllers\TournamentController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

URL::forceRootUrl(config('app.url'));

Route::get('info', function () {
    return "api";
});

Route::get('/featured', [FeatureController::class, 'index']);
Route::get('/rplActivity', [RplActivityController::class, 'index']);
Route::get('/tournament', [TournamentController::class, 'index']);

