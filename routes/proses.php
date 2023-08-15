<?php

use App\Http\Controllers\Admin\TanggapanController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

Route::prefix('proses')->group(function () {
    Route::controller(LaporanController::class)->group(function () {
        Route::post('laporan', 'store')->name('proses.laporan.store')->middleware(['auth', 'masyarakat']);
    });

    Route::controller(TanggapanController::class)->group(function () {
        Route::middleware(['auth'])->group(function () {
            Route::post('tanggapan', 'store')->name('prsoes.tanggapan.store')->middleware('admin_or_petugas');
        });
    });
});
