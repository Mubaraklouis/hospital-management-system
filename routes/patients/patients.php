<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

/*
 * exporting a route to be used in the web file
 */


Route::get('/index', [PatientController::class, 'index'])->name('patients.index');
Route::get('/create', [PatientController::class, 'create'])->name('patient.create');
Route::post('store',[PatientController::class,'store'])->name('patient.store');
Route::delete('/delete/{id}',[PatientController::class,'destroy'])->name('patient.delete');
Route::get('/show/{id}',[PatientController::class,'show'])->name('patient.show');
Route::put('/update/{id}',[PatientController::class,'update'])->name('patient.update');


