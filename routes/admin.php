<?php

use App\Http\Controllers\ACSController;
use App\Http\Controllers\PolytraumaController;
use App\Models\ACS;
use App\Models\Branch;
use App\Models\Polytrauma;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        $data = ACS::all();
        return view('dashboard.pages.home', compact('data'));
    });
    Route::get('/polytrauma', function () {
        $data = Polytrauma::all();
        return view('dashboard.pages.home', compact('data'));
    });
    Route::get('/fullform-acs/{id}', function ($id) {
        $data = ACS::findOrFail($id);
        return view('dashboard.pages.full-table', compact('data'));
    })->name('full-table');
    Route::get('/fullform-polyt/{id}', function ($id) {
        $data = Polytrauma::findOrFail($id);
        return view('dashboard.pages.full-table-polyt', compact('data'));
    })->name('full-table-polyt');
    // Add the route for the create-page

    Route::group(['prefix' => 'acs'], function ()
    {
        Route::get('create-page', function () {
            $branches = Branch::all(['id', 'name']);
            // Handle logic for the create page
            return view('dashboard.pages.create-page', compact('branches'));
        })->name('acs.create-page');
        Route::post('add', [ACSController::class, 'store'])->name('acs.add');
    });


    Route::delete('/delete/{id}', [ACSController::class, 'destroy'])->name('delete');
    Route::delete('/delete/{id}', [PolytraumaController::class, 'destroy'])->name('delete');
});
