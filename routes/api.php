<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\StatisticsController;
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
});

Route::group(['prefix' => 'statistics'], function () {
    Route::get('acs', [StatisticsController::class, 'acs']);
    Route::get('polytrauma', [StatisticsController::class, 'polytrauma']);
});
