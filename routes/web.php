<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\EdutiantController;

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

Route::get('/', function () {
    return view('welcome');
});

// VILLES //
Route::get('/villes', [VilleController::class, 'index'])->name('ville.index');
Route::get('/ville/{ville}', [VilleController::class, 'show'])->name('ville.show');

// EDUTIANT //
Route::get('/edutiants', [EdutiantController::class, 'index'])->name('edutiant.index');
Route::get('/edutiant/{edutiant}', [EdutiantController::class, 'show'])->name('edutiant.show');
