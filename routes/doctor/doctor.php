<?php
/*
* these contains all the routes responsible for doctor's functionality
*
*/

use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

Route::get('/home',[DoctorController::class,'show'])->name('doctor.home');
Route::get('/search',[DoctorController::class,'searchPatient'])->name('doctor.search');





