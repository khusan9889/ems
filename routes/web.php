<?php

use App\Http\Controllers\ReportFormController;
use App\Http\Controllers\PrintController;

use Illuminate\Support\Facades\Route;

Route::get('/generate-pdf', [PrintController::class,'generatePDF']);

Route::get('/', [ReportFormController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
