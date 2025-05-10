<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Screen1Controller;
use App\Http\Controllers\Screen2Controller;
use App\Http\Controllers\Screen3Controller;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('screen-1', [Screen1Controller::class, 'index'])->middleware(['auth', 'verified'])->name('screen-1');
Route::get('screen-2', [Screen2Controller::class, 'index'])->middleware(['auth', 'verified'])->name('screen-2');
Route::post('search-unsplash', [Screen2Controller::class, 'search'])->middleware(['auth', 'verified'])->name('screen-2');
Route::get('screen-3', function () {
    return Inertia::render('screen-3');
})->middleware(['auth', 'verified'])->name('screen-3');
Route::get('grid', [Screen3Controller::class, 'grid'])->middleware(['auth', 'verified'])->name('screen-3.grid');
Route::post('click', [Screen3Controller::class, 'click'])->middleware(['auth', 'verified'])->name('screen-3.click');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
