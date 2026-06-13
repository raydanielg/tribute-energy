<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

// Public pages
Route::get('/',         [PagesController::class, 'home'])->name('home');
Route::get('/features', [PagesController::class, 'features'])->name('features');
Route::get('/products', [PagesController::class, 'products'])->name('products');
Route::get('/pricing',  [PagesController::class, 'pricing'])->name('pricing');
Route::get('/about',    [PagesController::class, 'about'])->name('about');
Route::get('/terms',    [PagesController::class, 'terms'])->name('terms');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});
