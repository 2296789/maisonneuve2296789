<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\EdutiantController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome'); 
})->name('welcome');

// VILLES //
Route::get('/villes', [VilleController::class, 'index'])->name('ville.index');
Route::get('/ville/{ville}', [VilleController::class, 'show'])->name('ville.show');

// EDUTIANT //
Route::get('/edutiants', [EdutiantController::class, 'index'])->name('edutiant.index');
Route::get('/edutiant/{edutiant}', [EdutiantController::class, 'show'])->name('edutiant.show');
Route::get('/create/edutiant', [EdutiantController::class, 'create'])->name('edutiant.create');
Route::post('/create/edutiant', [EdutiantController::class, 'store'])->name('edutiant.store');
Route::get('/edit/edutiant/{edutiant}', [EdutiantController::class, 'edit'])->name('edutiant.edit');
Route::put('/edit/edutiant/{edutiant}', [EdutiantController::class, 'update'])->name('edutiant.update');
Route::delete('/edutiant/{edutiant}', [EdutiantController::class, 'destroy'])->name('edutiant.delete');

// QUERY //
Route::get('/query', [EdutiantController::class, 'query']);