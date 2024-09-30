<?php
/*
* these contains all the routes responsible for doctor's functionality
*
*/

use App\Http\Controllers\DiagonoseController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

Route::get('/home',[DoctorController::class,'show'])->name('doctor.home');
Route::get('/search',[DoctorController::class,'searchPatient'])->name('doctor.search');
Route::post('assign/diagonose/{id}',[DoctorController::class,'AssignTest'])->name('doctor.assign');


//diagonoses routes are registered

Route::get('/diagonoses',[DiagonoseController::class,'index'])->name('diagonoses.index');
Route::delete('/diagonose/{id}',[DiagonoseController::class,'destroy'])->name('diagonose.delete');
Route::post('diagonose/create',[DiagonoseController::class,'store'])->name('diagonose.store');
Route::get('diagonose/create',[DiagonoseController::class,'create'])->name('diagonose.create');





