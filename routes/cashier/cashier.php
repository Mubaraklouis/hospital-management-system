<?php

use App\Http\Controllers\cashierController;
use Illuminate\Support\Facades\Route;

//all cashier routes

Route::get('/index',[cashierController::class,'index'])->name('cashier.home');
Route::get('/search',[cashierController::class,'search'])->name('cashier.search');
