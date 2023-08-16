<?php

use App\Http\Controllers\Admin\LaporanController as AdminLaporanController;
use App\Http\Controllers\Admin\TanggapanController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

Route::prefix('proses')->group(function () {
    Route::controller(AdminLaporanController::class)->group(function() {
        Route::get('cetak-laporan', 'cetakLaporan')->name('proses.laporan.cetak')->middleware('admin_or_petugas');
        Route::post('validasi-cetak-laporan', 'validasiCetakLaporan')->name('proses.laporan.validasicetak')->middleware('admin_or_petugas');
    });
    
    Route::controller(LaporanController::class)->group(function () {
        Route::post('laporan', 'store')->name('proses.laporan.store')->middleware(['auth', 'masyarakat']);
    });

    Route::controller(TanggapanController::class)->group(function () {
        Route::middleware(['auth'])->group(function () {
            Route::post('tanggapan', 'store')->name('prsoes.tanggapan.store')->middleware('admin_or_petugas');
        });
    });
});
