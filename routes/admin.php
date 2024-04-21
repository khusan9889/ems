<?php

use App\Http\Controllers\ACSController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\OdsAmbulanceBrigadesController;
use App\Http\Controllers\OdsAmbulanceDistrictsController;
use App\Http\Controllers\OdsAmbulanceHospitalsController;
use App\Http\Controllers\OdsAmbulanceIndicatorsController;
use App\Http\Controllers\OdsAmbulanceReferencesController;
use App\Http\Controllers\OdsAmbulanceRegionsController;
use App\Http\Controllers\OdsAmbulanceSubstationsController;
use App\Http\Controllers\Permissions\PermissionController;
use App\Http\Controllers\Permissions\RoleController;
use App\Http\Controllers\PolytPrintController;
use App\Http\Controllers\PolytraumaController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ReportFormController;
use App\Http\Controllers\SubFilialController;
use App\Http\Controllers\UserController;
use App\Models\OdsAmbulanceRegions;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'permission'], function () {

        Route::get('/acs/list', [ACSController::class, 'index']);
        Route::get('fullform-acs/{id}', [ACSController::class, 'fullform'])->name('full-table');

        Route::get('/polytrauma/list', [PolytraumaController::class, 'index']);
        Route::get('/fullform-polyt/{id}', [PolytraumaController::class, 'fulltable'])->name('full-table-polyt');

        Route::group(['prefix' => 'acs'], function () {
            Route::get('create-page', [ACSController::class, 'create'])->name('acs.create-page');
            Route::post('add', [ACSController::class, 'store'])->name('acs.add');
            Route::get('/edit-page/{id}', [ACSController::class, 'edit'])->name('edit-page');
            Route::put('/update-data/{id}', [ACSController::class, 'update'])->name('update-data');
            Route::delete('/delete/{id}', [ACSController::class, 'destroy'])->name('acs.delete');
        });

        Route::group(['prefix' => 'polytrauma'], function () {
            Route::get('polyt-create-page', [PolytraumaController::class, 'create'])->name('polytrauma.polyt-create-page');
            Route::post('add', [PolytraumaController::class, 'store'])->name('polytrauma.add');
            Route::get('/polyt-edit-page/{id}', [PolytraumaController::class, 'edit'])->name('polyt-edit-page');
            Route::put('/update-data/{id}', [PolytraumaController::class, 'update'])->name('polyt-update-data');
            Route::delete('/delete/{id}', [PolytraumaController::class, 'destroy'])->name('polytrauma.delete');
        });

        Route::group(['prefix' => 'users'], function () {
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
            Route::get('/', [UserController::class, 'index'])->name('users.index');

            Route::get('users-create-page', [UserController::class, 'create'])->name('users.create-page');

            Route::post('/users', [UserController::class, 'store'])->name('users.store');

            Route::get('/edit-page/{user}', [UserController::class, 'edit'])->name('users.edit-page');

            Route::put('/update-data/{user}', [UserController::class, 'update'])->name('users.update');
        });

        //        Route::post('/departments/fetch', [DepartmentController::class, 'fetchDepartments'])->name('departments.fetch');


        Route::group(['prefix' => 'branch'], function () {
            Route::get('/', [BranchController::class, 'index']);
        });

        Route::group(['prefix' => 'sub-branch'], function () {
            Route::get('/', [SubFilialController::class, 'index'])->name('sub.index');
            Route::get('/create-page', [SubFilialController::class, 'create'])->name('sub.create-page');
            Route::get('/edit/{id}', [SubFilialController::class, 'edit'])->name('sub.edit');
            Route::put('/update/{id}', [SubFilialController::class, 'update'])->name('sub.update');
            Route::post('/store', [SubFilialController::class, 'store'])->name('sub.store');
            Route::delete('/delete/{id}', [SubFilialController::class, 'destroy'])->name('sub.delete');
        });

        Route::group(['prefix' => 'departments'], function () {
            Route::get('/', [DepartmentController::class, 'index'])->name('departments.index');
            Route::get('/edit/{department}', [DepartmentController::class, 'edit'])->name('departments.edit');
            Route::put('/update/{department}', [DepartmentController::class, 'update'])->name('department.update');
            Route::get('/create-page', [DepartmentController::class, 'create'])->name('department.create-page');
            Route::post('/store', [DepartmentController::class, 'store'])->name('department.store');
            Route::delete('/delete/{id}', [DepartmentController::class, 'destroy'])->name('department.delete');
        });

        Route::get('/acs/statistics', [ACSController::class, 'statistics'])->name('acs.statistics');
        Route::prefix('/polytrauma/statistics')->group(function () {
            Route::get('/', [PolytraumaController::class, 'statistics'])->name('statistics');
            Route::get('/less16', [PolytraumaController::class, 'less16'])->name('less16');
            Route::get('/more16', [PolytraumaController::class, 'more16'])->name('more16');
        });

        Route::prefix('/roles')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('role.list');
        });
        Route::prefix('/permissions')->group(function () {
            Route::get('/{name}', [PermissionController::class, 'index'])->name('role.permission');
            Route::post('/update', [PermissionController::class, 'update'])->name('permission.update');
        });

        Route::get('/activities', [UserController::class, 'activity'])->name('activity');

        Route::group(['prefix' => 'data'], function () {
            Route::get('/', [ReportFormController::class, 'index'])->name('form.index');
            Route::get('/edit/{id}', [ReportFormController::class, 'edit'])->name('form.edit');
            Route::get('/show/{id}', [ReportFormController::class, 'show'])->name('form.show');
            Route::post('/update/{id}', [ReportFormController::class, 'update'])->name('form.update');

        });


        //-----------------------------------------Med Data--------------------------------------
        Route::group(['prefix' => 'region'], function () {
            Route::get('/', [OdsAmbulanceRegionsController::class, 'index'])->name('region.index');
            Route::get('/create-page', [OdsAmbulanceRegionsController::class, 'create'])->name('region.create-page');
            Route::delete('/delete/{id}', [OdsAmbulanceRegionsController::class, 'destroy'])->name('region.delete');
            Route::post('/store', [OdsAmbulanceRegionsController::class, 'store'])->name('region.store');
            Route::put('/update/{id}', [OdsAmbulanceRegionsController::class, 'update'])->name('region.update');
            Route::get('/edit/{id}', [OdsAmbulanceRegionsController::class, 'edit'])->name('region.edit');

        });

        Route::group(['prefix' => 'district'], function () {
            Route::get('/', [OdsAmbulanceDistrictsController::class, 'index'])->name('district.index');
            Route::get('/create-page', [OdsAmbulanceDistrictsController::class, 'create'])->name('district.create-page');
            Route::delete('/delete/{id}', [OdsAmbulanceDistrictsController::class, 'destroy'])->name('district.delete');
            Route::post('/store', [OdsAmbulanceDistrictsController::class, 'store'])->name('district.store');
            Route::put('/update/{id}', [OdsAmbulanceDistrictsController::class, 'update'])->name('district.update');
            Route::get('/edit/{id}', [OdsAmbulanceDistrictsController::class, 'edit'])->name('district.edit');
        });

        Route::group(['prefix' => 'hospital'], function () {
            Route::get('/', [OdsAmbulanceHospitalsController::class, 'index'])->name('hospital.index');
            Route::get('/create-page', [OdsAmbulanceHospitalsController::class, 'create'])->name('hospital.create-page');
            Route::delete('/delete/{id}', [OdsAmbulanceHospitalsController::class, 'destroy'])->name('hospital.delete');
            Route::post('/store', [OdsAmbulanceHospitalsController::class, 'store'])->name('hospital.store');
            Route::put('/update/{id}', [OdsAmbulanceHospitalsController::class, 'update'])->name('hospital.update');
            Route::get('/edit/{id}', [OdsAmbulanceHospitalsController::class, 'edit'])->name('hospital.edit');
        });

        Route::group(['prefix' => 'substation'], function () {
            Route::get('/', [OdsAmbulanceSubstationsController::class, 'index'])->name('substation.index');
            Route::get('/create-page', [OdsAmbulanceSubstationsController::class, 'create'])->name('substation.create-page');
            Route::delete('/delete/{id}', [OdsAmbulanceSubstationsController::class, 'destroy'])->name('substation.delete');
            Route::delete('/delete/{id}', [OdsAmbulanceSubstationsController::class, 'destroy'])->name('substation.delete');
            Route::post('/store', [OdsAmbulanceSubstationsController::class, 'store'])->name('substation.store');
            Route::put('/update/{id}', [OdsAmbulanceSubstationsController::class, 'update'])->name('substation.update');
            Route::get('/edit/{id}', [OdsAmbulanceSubstationsController::class, 'edit'])->name('substation.edit');
        });

        Route::group(['prefix' => 'brigade'], function () {
            Route::get('/', [OdsAmbulanceBrigadesController::class, 'index'])->name('brigade.index');
            Route::get('/create-page', [OdsAmbulanceBrigadesController::class, 'create'])->name('brigade.create-page');
            Route::delete('/delete/{id}', [OdsAmbulanceBrigadesController::class, 'destroy'])->name('brigade.delete');
            Route::post('/store', [OdsAmbulanceBrigadesController::class, 'store'])->name('brigade.store');
            Route::put('/update/{id}', [OdsAmbulanceBrigadesController::class, 'update'])->name('brigade.update');
            Route::get('/edit/{id}', [OdsAmbulanceBrigadesController::class, 'edit'])->name('brigade.edit');
        });

        Route::group(['prefix' => 'reference'], function () {
            Route::get('/', [OdsAmbulanceReferencesController::class, 'index'])->name('reference.index');
            Route::get('/create-page', [OdsAmbulanceReferencesController::class, 'create'])->name('reference.create-page');
            Route::delete('/delete/{id}', [OdsAmbulanceReferencesController::class, 'destroy'])->name('reference.delete');
            Route::post('/store', [OdsAmbulanceReferencesController::class, 'store'])->name('reference.store');
            Route::put('/update/{id}', [OdsAmbulanceReferencesController::class, 'update'])->name('reference.update');
            Route::get('/edit/{id}', [OdsAmbulanceReferencesController::class, 'edit'])->name('reference.edit');
        });

        Route::group(['prefix' => 'indicator'], function () {
            Route::get('/', [OdsAmbulanceIndicatorsController::class, 'index'])->name('indicator.index');
            Route::get('/create-page', [OdsAmbulanceIndicatorsController::class, 'create'])->name('indicator.create-page');
            Route::delete('/delete/{id}', [OdsAmbulanceIndicatorsController::class, 'destroy'])->name('indicator.delete');
            Route::post('/store', [OdsAmbulanceIndicatorsController::class, 'store'])->name('indicator.store');
            Route::put('/update/{id}', [OdsAmbulanceIndicatorsController::class, 'update'])->name('indicator.update');
            Route::get('/edit/{id}', [OdsAmbulanceIndicatorsController::class, 'edit'])->name('indicator.edit');

        });
        Route::group(['prefix' => 'indicator-file'], function () {
            Route::get('/', [OdsAmbulanceIndicatorsController::class, 'index_file'])->name('indicator.file');
            Route::delete('/delete/{id}', [OdsAmbulanceIndicatorsController::class, 'delete_files'])->name('indicator-file.delete');
        });
        Route::post('/import', [OdsAmbulanceIndicatorsController::class, 'importExcel'])->name('indicator.import');
        Route::get('/export', [OdsAmbulanceIndicatorsController::class, 'exportExcel'])->name('indicator.export');

    });


    Route::get('week_data/{data}', [ReportFormController::class, 'week_data'])->name('form.week_data');
    Route::get('district_region/{data}', [OdsAmbulanceDistrictsController::class, 'district_region']);
    Route::get('indicator/district_region/{data}', [OdsAmbulanceDistrictsController::class, 'district_region']);
    Route::get('indicator/edit/district_region/{data}', [OdsAmbulanceDistrictsController::class, 'district_region']);
    Route::get('department_branch/{id}', [BranchController::class, 'fetch']);

    Route::group(['prefix' => 'departments'], function () {
        Route::get('/branch', [BranchController::class, 'fetchDepartments']);
    });

    Route::get('print/{id}', [PrintController::class, 'create_pdf'])->name('save');
    Route::get('polyt-print/{id}', [PolytPrintController::class, 'create_pdf'])->name('polyt-save');


    Route::get('acs/edit-page/department_branch/{id}', [BranchController::class, 'fetch']);
    Route::get('acs/department_branch/{id}', [BranchController::class, 'fetch']);
    Route::get('polytrauma/polyt-edit-page/department_branch/{id}', [BranchController::class, 'fetch']);
    Route::get('polytrauma/department_branch/{id}', [BranchController::class, 'fetch']);


});
