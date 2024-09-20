<?php

use App\Http\Controllers\ProfileController;
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



/*
 * All the routes with auth middleware
 * All with a specific group
 */

 //these are routes for patient crude operation

Route::middleware('auth')->prefix('patients')->group(function(){
    require  __DIR__ . '/patients/patients.php';

});

//these are the routes for reception functionality

Route::middleware('auth')->prefix('receptant')->group(function(){
    require  __DIR__ . '/receptant/receptant.php';
});
//these are the routes for doctor functionalities

Route::middleware('auth')->prefix('doctor')->group(function(){
    require  __DIR__ . '/doctor/doctor.php';
});

require __DIR__.'/auth.php';
