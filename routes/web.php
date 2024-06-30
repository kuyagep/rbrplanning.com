<?php

use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\DatabaseBackupController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DroppedOutController;
use App\Http\Controllers\EmploymentStatusController;
use App\Http\Controllers\ExistingBuilding;
use App\Http\Controllers\ExtensionSchoolController;
use App\Http\Controllers\FundingSourceController;
use App\Http\Controllers\GradeSchoolController;
use App\Http\Controllers\InventoryOfClassroomController;
use App\Http\Controllers\InventoryOfSchoolBuildingController;
use App\Http\Controllers\MakeShiftController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PositionCategoryController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProfileSettingsController;
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
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\YearLevelController;
use App\Models\InventoryOfFurniture;
use Illuminate\Support\Facades\Route;

Route::get('/', [RedirectController::class, 'index'])->name('index');

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {

    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    // Location Management Routes
    Route::resource('regions', RegionController::class);
    Route::resource('divisions', DivisionController::class);
    Route::post('/fetch-divisions', [DistrictController::class, 'fetchDivisions'])->name('fetch.divisions');
    Route::resource('districts', DistrictController::class);
    Route::post('/fetch-districts', [SchoolController::class, 'fetchDistricts'])->name('fetch.districts');
    Route::resource('schools', SchoolController::class);
    Route::resource('sections', SectionController::class);
    Route::post('/fetch-schools', [ExtensionSchoolController::class, 'fetchsSchool'])->name('fetch.schools');
    Route::resource('extension-schools', ExtensionSchoolController::class);

    // Grade and Level Management Routes
    Route::get('/grades', [GradeSchoolController::class, 'index'])->name('grades.index');
    Route::post('/grades', [GradeSchoolController::class, 'storeGrade']);
    Route::get('/grades/{grade}', [GradeSchoolController::class, 'showGrade']);
    Route::put('/grades/{grade}', [GradeSchoolController::class, 'updateGrade']);
    Route::delete('/grades/{grade}', [GradeSchoolController::class, 'destroyGrade']);
    Route::post('/grades/{grade}/schools', [GradeSchoolController::class, 'attachSchool']);
    Route::delete('/grades/{grade}/schools/{school}', [GradeSchoolController::class, 'detachSchool']);

    Route::post('/schools/store', [GradeSchoolController::class, 'storeSchool']);
    Route::get('/schools/{school}', [GradeSchoolController::class, 'showSchool']);
    Route::put('/schools/{school}', [GradeSchoolController::class, 'updateSchool']);
    Route::delete('/schools/delete/{school}', [GradeSchoolController::class, 'destroySchool'])->name('schools.delete');

    Route::resource('year-levels', YearLevelController::class);

// Position and Personnel Management Routes
    Route::resource('positions', PositionController::class);
    Route::resource('position-categories', PositionCategoryController::class);
    Route::resource('personnel', PersonnelController::class);
    Route::resource('employment-statuses', EmploymentStatusController::class);

// School Year and Programs Management Routes
    Route::resource('school-year', SchoolYearController::class);
    Route::post('/fetch-strands', [SpecializationController::class, 'fetchStrands'])->name('fetch.strands');
    Route::resource('specializations', SpecializationController::class);
    Route::resource('special-programs', SpecialProgramsController::class);
    Route::resource('strands', StrandController::class);

    Route::resource('tracks', TrackController::class);
    Route::resource('funding-sources', FundingSourceController::class);

    // User Management Routes
    Route::delete('/users/delete', [UserController::class, 'deleteMultiple'])->name('delete.multiple.users');
    Route::post('/users/reset/password', [UserController::class, 'resetPassword'])->name('reset.password.user');
    Route::get('/export/users/excel', [UserController::class, 'exportExcelUser'])->name('export.excel.user');
    Route::get('/export/users/pdf', [UserController::class, 'exportPdfUser'])->name('export.pdf.user');
    Route::resource('users', UserController::class);

// Additional Routes
    Route::resource('reports', ReportController::class);
    Route::get('/backup', [DatabaseBackupController::class, 'index'])->name('backup.index');
    Route::post('/backup/create', [DatabaseBackupController::class, 'create'])->name('backup.create');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');
    Route::get('/profile-settings', [ProfileSettingsController::class, 'index'])->name('profile-settings.index');
    Route::put('/profile-settings', [ProfileSettingsController::class, 'update'])->name('profile-settings.update');
    Route::post('/profile-settings/check-password', [ProfileSettingsController::class, 'checkCurrentPassword'])->name('profile-settings.check-current-password');

});

Route::prefix('user')->middleware(['auth:sanctum', 'role:user'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard.index');

    Route::get('/personnels', [PersonnelController::class, 'personnelIndex'])->name('user.personnels.index');
    Route::get('/personnels/create', [PersonnelController::class, 'personnelCreate'])->name('user.personnels.create');
    Route::post('/personnels/store', [PersonnelController::class, 'personnelStore'])->name('user.personnels.store');
    Route::get('/personnels/{id}', [PersonnelController::class, 'personnelShow'])->name('user.personnels.show');
    Route::get('/personnels/{id}/edit', [PersonnelController::class, 'personnelEdit'])->name('user.personnels.edit');
    Route::put('/personnels/{id}/update', [PersonnelController::class, 'personnelUpdate'])->name('user.personnels.update');
    Route::delete('/personnels/{id}/delete', [PersonnelController::class, 'personnelDestroy'])->name('user.personnels.destroy');

    Route::get('/existing-buildings', [ExistingBuilding::class, 'index'])->name('user.existing-buildings.index');
    Route::get('/existing-buildings/create', [ExistingBuilding::class, 'create'])->name('user.existing-buildings.create');

// Inventory Management Routes
    Route::resource('inventory-of-classrooms', InventoryOfClassroomController::class);
    Route::resource('inventory-of-school-buildings', InventoryOfSchoolBuildingController::class);
    Route::resource('tls', TLSController::class);
    Route::resource('inventory-of-furniture', InventoryOfFurniture::class);
    // Learner and Attendance Management Routes
    Route::resource('registered-learners', RegisteredLearnerController::class);
    Route::resource('attendances', AttendanceController::class);
    Route::resource('make-shifts', MakeShiftController::class);
    Route::resource('dropped-outs', DroppedOutController::class);
    Route::resource('transferred-in', TransferredInController::class);
    Route::resource('transferred-out', TransferredOutController::class);
});
