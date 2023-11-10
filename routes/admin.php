<?php

use App\Http\Controllers\ACSController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Permissions\PermissionController;
use App\Http\Controllers\Permissions\RoleController;
use App\Http\Controllers\PolytPrintController;
use App\Http\Controllers\PolytraumaController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ReportFormController;
use App\Http\Controllers\SubFilialController;
use App\Http\Controllers\UserController;
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
            //            Route::get('/branch', [BranchController::class, 'fetchDepartments']);
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
    });
    Route::get('week_data/{data}', [ReportFormController::class, 'week_data'])->name('form.week_data');

    Route::group(['prefix' => 'departments'], function () {
        Route::get('/branch', [BranchController::class, 'fetchDepartments']);
    });

    Route::get('print/{id}', [PrintController::class, 'create_pdf'])->name('save');
    Route::get('polyt-print/{id}', [PolytPrintController::class, 'create_pdf'])->name('polyt-save');



});
