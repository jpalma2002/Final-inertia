<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PController;
use App\Http\Controllers\ThriftyController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('players', ThriftyController::class);
Route::get('/thriftys', [ThriftyController::class, 'index']);

Route::get('/thriftys/create', [ThriftyController::class, 'create'])->name('thriftys.create');
Route::post('/thriftys', [ThriftyController::class, 'store'])->name('thriftys.store');
Route::get('/thriftys/{id}', [ThriftyController::class, 'show']);
Route::put('/thriftys/{id}', [ThriftyController::class, 'update']);
Route::delete('/thriftys/{id}', [ThriftyController::class, 'destroy']);




require __DIR__.'/auth.php';
