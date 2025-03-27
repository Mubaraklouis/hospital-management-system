<?php

use App\Http\Controllers\ReceptantController;
use Illuminate\Support\Facades\Route;


/*
 * exporting a route to be used in the web file
 */


Route::get('/home', [receptantController::class, 'home'])->name('receptant.home');


