<?php

use App\Http\Controllers\ACSController;
use App\Http\Controllers\PolytraumaController;
use App\Models\ACS;
use App\Models\Branch;
use App\Models\Polytrauma;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [ACSController::class, 'index']);
    Route::get('/polytrauma', [PolytraumaController::class, 'index']);

    Route::get('/fullform-acs/{id}', function ($id) {
        $data = ACS::findOrFail($id);
        return view('dashboard.pages.full-table', compact('data'));
    })->name('full-table');
    Route::get('/fullform-polyt/{id}', function ($id) {
        $data = Polytrauma::findOrFail($id);
        return view('dashboard.pages.full-table-polyt', compact('data'));
    })->name('full-table-polyt');
    // Add the route for the create-page

    Route::group(['prefix' => 'acs'], function () {
        Route::get('create-page', function () {
            $branches = Branch::all(['id', 'name']);
            return view('dashboard.pages.create-page', compact('branches'));
        })->name('acs.create-page');

        Route::post('add', [ACSController::class, 'store'])->name('acs.add');

        Route::get('/edit-page/{id}', [ACSController::class, 'edit'])->name('edit-page');
        Route::put('/update-data/{id}', [ACSController::class, 'update'])->name('update-data');



        Route::delete('/delete/{id}', [ACSController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => 'polytrauma'], function () {
        Route::get('polyt-create-page', function () {
            $branches = Branch::all(['id', 'name']);
            return view('dashboard.pages.polyt-create-page', compact('branches'));
        })->name('polytrauma.polyt-create-page');

        Route::post('add', [PolytraumaController::class, 'store'])->name('polytrauma.add');

        Route::get('/polyt-edit-page/{id}', [PolytraumaController::class, 'edit'])->name('polyt-edit-page');
        Route::put('/update-data/{id}', [PolytraumaController::class, 'update'])->name('polyt-update-data');

        Route::delete('/delete/{id}', [PolytraumaController::class, 'destroy'])->name('delete');
    });
});
