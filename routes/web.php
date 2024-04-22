<?php

use App\Http\Controllers\ReportFormController;
use Illuminate\Support\Facades\Route;

Route::get('/generate-pdf', 'PrintController@generatePDF');

Route::get('/', [ReportFormController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
