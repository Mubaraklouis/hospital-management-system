<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\receiptController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Auth/Register', [
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



//these are the routes for doctor functionalities

Route::middleware('auth')->prefix('users')->group(function(){
    require  __DIR__ . '/users/user.php';
});


//cashier routes


Route::middleware('auth')->prefix('cashier')->group(function(){
    require  __DIR__ . '/cashier/cashier.php';
});



//receipt routes
Route::get('/register-receipt/{id}',[receiptController::class,'registerReceipt'])->name('receipt.register');
Route::get('/lab-receipt/{id}',[receiptController::class,'labReceipt'])->name('receipt.cashier');

//Routes for lab techcian
Route::get('/lab-home',[\App\Http\Controllers\labController::class,'index'])->name('lab.index');

require __DIR__.'/auth.php';
