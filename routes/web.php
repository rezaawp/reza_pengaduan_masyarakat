<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('user.index');
});

Route::prefix('laporan')->group(function () {
    Route::controller(LaporanController::class)->group(function () {
        Route::middleware(['auth', 'masyarakat'])->group(function () {
            Route::get('/create', 'create')->name('laporan.create');
            Route::get('/me', 'index');
        });
    });
});

Route::get('user', function () {
    $user = Auth::user();
    $userId = $user->id;
    return ['roles' => $user->getRoleNames(), 'permissions' => $user->getPermissionsViaRoles()];
    return response()->json([
        'result' => User::with('data_user')->where('id', $userId)->first(),
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'admin_or_petugas'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/proses.php';
