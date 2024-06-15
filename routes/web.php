<?php

use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RedirectController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index']);

    Route::resource('regions', RegionController::class);
    Route::delete('/regions/delete', [RegionController::class, 'deleteMultiple'])->name('regions.deleteMultiple');
    Route::post('/regions/{id}/update', [RegionController::class, 'update'])->name('regions.update');

    Route::get('/users', [UserController::class, 'index'])->name('all.user');
    Route::get('/users/create', [UserController::class, 'create'])->name('create.user');
    Route::post('/users', [UserController::class, 'store'])->name('store.user');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('show.user');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/users/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::post('/users/{id}/destroy', [UserController::class, 'destroy'])->name('destroy.user');
    Route::delete('/users/delete', [UserController::class, 'deleteMultiple'])->name('users.deleteMultiple');
    Route::post('/users/reset/password', [UserController::class, 'resetPassword'])->name('reset.password.user');
    Route::get('/export/users/excel', [UserController::class, 'exportExcelUser'])->name('export.excel.user');
    Route::get('/export/users/pdf', [UserController::class, 'exportPdfUser'])->name('export.pdf.user');

});
