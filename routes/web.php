<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class,'form'])->name('index.form'); 
Route::post('/saveform', [UserController::class,'save'])->name('save.form');
Route::get('/table', [UserController::class, 'table'])->name('index.table');
Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete.form');
