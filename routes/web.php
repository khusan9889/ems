<?php

use App\Http\Controllers\ReportFormController;
use Illuminate\Support\Facades\Route;


Route::get('ok/{id}', [\App\Http\Controllers\PolytPrintController::class, 'create_pdf']);

Route::get('php', function () {
    return phpinfo();
});

Route::get('/', [ReportFormController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

// Route::get('/acs/full-table', [ACSController::class, 'fullTable'])->name('acs.full-table');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
