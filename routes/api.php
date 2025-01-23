<?php

use App\Http\Controllers\TaskController;
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

Route::name('user.')->group(function () {
    Route::prefix('/users')->group(
        function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::post('/', [UserController::class, 'store'])->name('store');
            Route::get('/{uuid}', [UserController::class, 'show'])->name('show')->middleware(['uuid']);
            Route::put('/', [UserController::class, 'update'])->name('update')->middleware(['uuid']);
            Route::delete('/', [UserController::class, 'destroy'])->name('destroy')->middleware(['uuid']);
        }
    );
});

Route::name('task.')->group(function () {
    Route::prefix('/tasks')->group(
        function () {
            Route::get('/{uuid}', [TaskController::class, 'index'])->name('index')->middleware(['uuid']);
        }
    );
});
