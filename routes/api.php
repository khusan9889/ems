<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\StatisticsController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\FilialSubWeekController;
use App\Http\Controllers\OdsAmbulanceIndicatorsController;
use App\Http\Controllers\SubFilialController;
use App\Http\Controllers\WeekController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthApiController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('profile', [AuthApiController::class, 'profile']);
    Route::delete('logout', [AuthApiController::class, 'logout']);
    Route::group(['prefix' => 'week'], function () {
        Route::get('', [WeekController::class, 'index']);
        Route::post('', [WeekController::class, 'store']);
        Route::get('{id}', [WeekController::class, 'show']);
        Route::put('{id}', [WeekController::class, 'update']);
        Route::delete('{id}', [WeekController::class, 'destroy']);
    });
    Route::group(['prefix' => 'branch'], function () {
        Route::get('/', [BranchController::class, 'index_off']);
    });

    Route::group(['prefix' => 'filial-sub'], function () {
        Route::get('', [SubFilialController::class, 'index']);
        Route::post('', [SubFilialController::class, 'store']);
        Route::get('{id}', [SubFilialController::class, 'show']);
        Route::put('{id}', [SubFilialController::class, 'update']);
        Route::delete('{id}', [SubFilialController::class, 'destroy']);
    });
    Route::group(['prefix' => 'sub-filial-week'], function () {
        Route::get('', [FilialSubWeekController::class, 'index']);
        Route::post('', [FilialSubWeekController::class, 'store']);
        Route::get('{id}', [FilialSubWeekController::class, 'show']);
        Route::put('{id}', [FilialSubWeekController::class, 'update']);
        Route::delete('{id}', [FilialSubWeekController::class, 'destroy']);
    });

});

Route::group(['prefix' => 'statistics'], function () {
    Route::get('acs', [StatisticsController::class, 'acs']);
    Route::get('polytrauma', [StatisticsController::class, 'polytrauma']);
});
Route::post('/import', [OdsAmbulanceIndicatorsController::class, 'importExcel']);

