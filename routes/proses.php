<?php

use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

Route::prefix('proses')->group(function () {
    Route::controller(LaporanController::class)->group(function () {
        Route::post('laporan', 'store')->name('proses.laporan.store')->middleware('masyarakat');
    });
});
