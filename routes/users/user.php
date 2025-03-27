<?php

/*
* these contains all the routes responsible for user's crude functionality
*
*/

use App\Http\Controllers\usersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [usersController::class, 'index'])->name('users.index');
Route::get('edit/{id}', [usersController::class, 'show'])->name('user.show');
Route::post('/users', [usersController::class, 'store'])->name('users.store');
Route::put('/{id}', [usersController::class, 'update'])->name('user.update');
Route::delete('/{id}', [usersController::class, 'destroy'])->name('users.destroy');

//user search
Route::any('/search', [usersController::class,'searchUser'] )->name('user.search');

//user assign role

Route::post('assign/{id}',[usersController::class,'assignRole'])->name('user.assign');
