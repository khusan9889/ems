<?php

use App\Http\Controllers\ACSController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Permissions\PermissionController;
use App\Http\Controllers\Permissions\RoleController;
use App\Http\Controllers\PolytraumaController;
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

        Route::group(['prefix' => 'departments'], function () {
            Route::get('/', [DepartmentController::class, 'index'])->name('departments.index');
            Route::get('/edit/{department}', [DepartmentController::class, 'edit'])->name('departments.edit');
            Route::put('/update/{department}', [DepartmentController::class, 'update'])->name('department.update');
            Route::get('/create-page', [DepartmentController::class, 'create'])->name('department.create-page');
            Route::post('/store', [DepartmentController::class, 'store'])->name('department.store');
//            Route::get('/branch', [BranchController::class, 'fetchDepartments']);
            Route::delete('/delete/{id}', [DepartmentController::class, 'destroy'])->name('department.delete');
        });

        Route::get('/acs/statistics', [ACSController::class, 'statistics']);
        Route::get('/polytrauma/statistics', [PolytraumaController::class, 'statistics']);

        Route::prefix('/roles')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('role.list');
        });
        Route::prefix('/permissions')->group(function () {
            Route::get('/{name}', [PermissionController::class, 'index'])->name('role.permission');
            Route::post('/update', [PermissionController::class, 'update'])->name('permission.update');
        });

        Route::get('/activities',);
    });
    Route::group(['prefix' => 'departments'], function () {
        Route::get('/branch', [BranchController::class, 'fetchDepartments']);
    });
});
