<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin', function () {
    return view('welcome');
})->name('admin');

// Auth::routes();


// Google login
Route::get('/admin/login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/admin/login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);


URL::forceRootUrl(config('app.url'));

Route::group(['prefix'=>'admin'],function() {

    //featured
    Route::get('/featured', [App\Http\Controllers\FeatureController::class, 'index']);
    Route::get('/featured/formAdd', [App\Http\Controllers\FeatureController::class, 'formAdd'])->name('featured.formAdd');
    Route::post('/featured/store', [App\Http\Controllers\FeatureController::class, 'store'])->name('featured.store');
    Route::get('/featured/edit/{id}', [App\Http\Controllers\FeatureController::class, 'edit'])->name('featured.edit');
    Route::delete('/featured/delete/{id}', [App\Http\Controllers\FeatureController::class, 'destroy'])->name('featured.destroy');
    Route::put('/featured/update/{id}', [App\Http\Controllers\FeatureController::class, 'update'])->name('featured.update');

    //PRL activity
    Route::get('/rplActivity', [App\Http\Controllers\RplActivityController::class, 'index']);
    Route::get('/rplActivity/formAdd', [App\Http\Controllers\RplActivityController::class, 'formAdd'])->name('rplActivity.formAdd');
    Route::post('/rplActivity/store', [App\Http\Controllers\RplActivityController::class, 'store'])->name('rplActivity.store');
    Route::get('/rplActivity/edit/{id}', [App\Http\Controllers\RplActivityController::class, 'edit'])->name('rplActivity.edit');
    Route::delete('/rplActivity/delete/{id}', [App\Http\Controllers\RplActivityController::class, 'destroy'])->name('rplActivity.destroy');
    Route::put('/rplActivity/update/{id}', [App\Http\Controllers\RplActivityController::class, 'update'])->name('rplActivity.update');

    //tournament
    Route::get('/tournament', [App\Http\Controllers\TournamentController::class, 'index']);
    Route::get('/tournament/formAdd', [App\Http\Controllers\TournamentController::class, 'formAdd'])->name('tournament.formAdd');
    Route::post('/tournament/store', [App\Http\Controllers\TournamentController::class, 'store'])->name('tournament.store');
    Route::get('/tournament/edit/{id}', [App\Http\Controllers\TournamentController::class, 'edit'])->name('tournament.edit');
    Route::delete('/tournament/delete/{id}', [App\Http\Controllers\TournamentController::class, 'destroy'])->name('tournament.destroy');
    Route::put('/tournament/update/{id}', [App\Http\Controllers\TournamentController::class, 'update'])->name('tournament.update');

    //logout
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

    //admin management
    Route::get('/adminManagement', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/adminManagement/formAdd', [App\Http\Controllers\UserController::class, 'formAdd'])->name('adminManagement.formAdd');
    Route::post('/adminManagementent/store', [App\Http\Controllers\UserController::class, 'store'])->name('adminManagement.store');
    Route::get('/adminManagement/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('adminManagement.edit');
    Route::delete('/adminManagement/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('adminManagement.destroy');
    Route::put('/adminManagement/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('adminManagement.update');


});

