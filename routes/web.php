<?php

use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DroppedOutController;
use App\Http\Controllers\EmploymentStatusController;
use App\Http\Controllers\ExtensionSchoolController;
use App\Http\Controllers\FundingSourceController;
use App\Http\Controllers\GradeLevelCategoryController;
use App\Http\Controllers\GradeLevelController;
use App\Http\Controllers\InventoryOfClassroomController;
use App\Http\Controllers\InventoryOfSchoolBuildingController;
use App\Http\Controllers\MakeShiftController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PositionCategoryController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RegisteredLearnerController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\SpecialProgramsController;
use App\Http\Controllers\StrandController;
use App\Http\Controllers\TLSController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\TransferredInController;
use App\Http\Controllers\TransferredOutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YearLevelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RedirectController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index']);
    Route::resource('/users', UserController::class);

    Route::resource('regions', RegionController::class);
    Route::resource('divisions', DivisionController::class);
    Route::resource('schools', SchoolController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('grade-level-categories', GradeLevelCategoryController::class);
    Route::resource('grade-levels', GradeLevelController::class);
    Route::resource('positions', PositionController::class);
    Route::resource('position-categories', PositionCategoryController::class);
    Route::resource('personnel', PersonnelController::class);
    Route::resource('employment-statuses', EmploymentStatusController::class);
    Route::resource('funding-sources', FundingSourceController::class);
    Route::resource('extension-schools', ExtensionSchoolController::class);
    Route::resource('inventory-of-classrooms', InventoryOfClassroomController::class);
    Route::resource('inventory-of-school-buildings', InventoryOfSchoolBuildingController::class);
    Route::resource('registered-learners', RegisteredLearnerController::class);
    Route::resource('attendances', AttendanceController::class);
    Route::resource('make-shifts', MakeShiftController::class);
    Route::resource('dropped-outs', DroppedOutController::class);
    Route::resource('school-year', SchoolYearController::class);
    Route::resource('specializations', SpecializationController::class);
    Route::resource('special-programs', SpecialProgramsController::class);
    Route::resource('strands', StrandController::class);
    Route::resource('tls', TLSController::class);
    Route::resource('tracks', TrackController::class);
    Route::resource('transferred-in', TransferredInController::class);
    Route::resource('transferred-out', TransferredOutController::class);
    Route::resource('year-levels', YearLevelController::class);

    Route::get('/users', [UserController::class, 'index'])->name('all.user');
    Route::get('/users/create', [UserController::class, 'create'])->name('create.user');
    Route::post('/users', [UserController::class, 'store'])->name('store.user');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('show.user');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('edit.user');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('update.user');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('destroy.user');
    Route::delete('/users/delete', [UserController::class, 'deleteMultiple'])->name('delete.multiple.users');
    Route::post('/users/reset/password', [UserController::class, 'resetPassword'])->name('reset.password.user');
    Route::get('/export/users/excel', [UserController::class, 'exportExcelUser'])->name('export.excel.user');
    Route::get('/export/users/pdf', [UserController::class, 'exportPdfUser'])->name('export.pdf.user');

});
