<?php

use App\Http\Controllers\ACSController;
use App\Models\ACS;
use App\Models\Polytrauma;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        $data = ACS::all();
        // $datap = Polytrauma::all();
        return view('dashboard.pages.home', compact('data'));
    });
    Route::get('/polytrauma', function () {
        $data = Polytrauma::all();
        return view('dashboard.pages.home', compact('data'));
    });
    
    // Route::get('acs', [ACSController::class, 'index']);
});

