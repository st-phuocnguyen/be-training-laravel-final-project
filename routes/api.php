<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('/users', [UserController::class, 'index'])->name('index');
Route::post('/users', [UserController::class, 'store'])->name('store');
Route::get('/users/{uuid}', [UserController::class, 'show'])->name('show');
Route::put('/users', [UserController::class, 'update'])->name('update')->middleware(['uuid']);
Route::delete('/users', [UserController::class, 'destroy'])->name('destroy')->middleware(['uuid']);
