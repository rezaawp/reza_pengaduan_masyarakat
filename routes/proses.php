<?php

use App\Http\Controllers\Admin\LaporanController as AdminLaporanController;
use App\Http\Controllers\Admin\TanggapanController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengaduanController;
use Illuminate\Support\Facades\Route;

Route::prefix('proses')->group(function () {
    Route::controller(AdminLaporanController::class)->group(function () {
        Route::get('cetak-laporan', 'cetakLaporan')->name('proses.laporan.cetak')->middleware('admin');
        Route::post('validasi-cetak-laporan', 'validasiCetakLaporan')->name('proses.laporan.validasicetak')->middleware('admin');
    });

    Route::controller(LaporanController::class)->group(function () {
        Route::post('laporan', 'store')->name('proses.laporan.store')->middleware(['auth', 'masyarakat']);
    });

    Route::controller(TanggapanController::class)->group(function () {
        Route::middleware(['auth'])->group(function () {
            Route::post('tanggapan', 'store')->name('prsoes.tanggapan.store')->middleware('admin_or_petugas');
        });
    });

    Route::controller(RegisteredUserController::class)->group(function () {
        Route::post('lengkapi-data-diri', 'isiDataDiri')->name('proses.lengkapi-data-diri')->middleware('auth:not_required_to_done');
    });

    Route::controller(PengaduanController::class)->group(function () {
        Route::put('pengaduan/selesai/{id}', 'pengaduanSelesai')->name('proses.pengaduan.selesai')->middleware(['auth', 'admin_or_petugas']);
        Route::put('pengaduan/proses/{id}', 'pengaduanProses')->name('proses.pengaduan.proses')->middleware(['auth', 'admin_or_petugas']);
        Route::delete('pengaduan/{id}', 'destroy')->name('proses.pengaduan.delete')->middleware('auth');
        Route::put('pengaduan/{id}', 'update')->name('proses.pengaduan.update')->middleware('auth');
    });
});
