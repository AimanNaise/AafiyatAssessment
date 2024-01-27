<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



// Route to display the form
Route::get('/', [UserController::class, 'form'])->name('index.form');

// Route to save form data
Route::post('/saveform', [UserController::class, 'save'])->name('save.form');

// Route to display the table with active users
Route::get('/table', [UserController::class, 'table'])->name('index.table');

// Route to soft delete a user
Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete.form');
