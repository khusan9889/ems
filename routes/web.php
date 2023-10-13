<?php

use App\Http\Controllers\ReportFormController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard.pages.home');
// });


Route::get('/', [ReportFormController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

//Route::get('/', function () {
//    return redirect('/acs/list');
//});

// Route::get('/acs/full-table', [ACSController::class, 'fullTable'])->name('acs.full-table');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
