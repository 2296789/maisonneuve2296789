<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\EdutiantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome'); 
})->name('welcome');

Route::middleware('auth')->group(function(){
    // ARTICLE //
    Route::get('/articles', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show');
    Route::get('/create/article', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/create/article', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/edit/article/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/edit/article/{article}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/article/{article}', [ArticleController::class, 'destroy'])->name('article.delete');
    Route::get('/article-pdf/{article}', [ArticleController::class, 'pdf'])->name('article.pdf');
    
    // CATEGORY //
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create/category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/create/category', [CategoryController::class, 'store'])->name('category.store');
    
    // USER //
    Route::get('/registration', [UserController::class, 'create'])->name('user.create');
    Route::post('/registration', [UserController::class, 'store'])->name('user.store');
    Route::get('/users',[UserController::class, 'index'])->name('user.index');
    
    // EDUTIANT //
    Route::get('/edutiants', [EdutiantController::class, 'index'])->name('edutiant.index');
    Route::get('/edutiant/{edutiant}', [EdutiantController::class, 'show'])->name('edutiant.show');
    Route::get('/create/edutiant', [EdutiantController::class, 'create'])->name('edutiant.create');
    Route::post('/create/edutiant', [EdutiantController::class, 'store'])->name('edutiant.store');
    Route::get('/edit/edutiant/{edutiant}', [EdutiantController::class, 'edit'])->name('edutiant.edit');
    Route::put('/edit/edutiant/{edutiant}', [EdutiantController::class, 'update'])->name('edutiant.update');
    Route::delete('/edutiant/{edutiant}', [EdutiantController::class, 'destroy'])->name('edutiant.delete');
});

// LOGIN //
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

// LANG //
Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');

// QUERY //
Route::get('/query', [EdutiantController::class, 'query']);

// VILLES //
Route::get('/villes', [VilleController::class, 'index'])->name('ville.index');
Route::get('/ville/{ville}', [VilleController::class, 'show'])->name('ville.show');