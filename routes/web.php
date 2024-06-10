<?php

use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
Route::get('/', [RedirectController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index']);

    Route::get('/users', [UserController::class, 'index'])->name('all.user');
    Route::get('/users/create', [UserController::class, 'create'])->name('create.user');
    Route::post('/users', [UserController::class, 'store'])->name('store.user');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('show.user');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/users/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::post('/users/{id}/destroy', [UserController::class, 'destroy'])->name('destroy.user');
});

// Route::get('/users', ListUsers::class)->name('users.index');
