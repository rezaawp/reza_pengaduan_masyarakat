<?php

use App\Http\Controllers\Admin\LaporanController as AdminLaporanController;
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
})->name('user.home');

Route::prefix('laporan')->group(function () {
    Route::controller(LaporanController::class)->group(function () {
        Route::middleware(['auth', 'masyarakat'])->group(function () {
            Route::get('/create', 'create')->name('laporan.create');
            Route::get('/me', 'index')->name('laporan.index');
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

Route::get('coba', function () {
    return view('laporan.pdf', [
        'item' => [
            'dari' => "Reza Khoirul Wijaya Putra",
            'tgl_pengaduan' => "2023-06-23",
            'lokasi_pengaduan' => "Jalan Karawang",
            'isi_laporan' => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis tenetur saepe eveniet labore architecto optio corporis veniam a amet. Rem natus non eveniet illo doloribus enim odit, soluta dicta excepturi quisquam, magni architecto laborum doloremque totam repellendus! Reprehenderit id, molestias esse incidunt suscipit numquam nam doloremque a tenetur unde amet rerum. Qui sunt, dignissimos, enim, consectetur architecto nostrum molestias accusamus minus omnis ab saepe quaerat nisi dolorum velit odio voluptatem labore! Ex dicta quisquam quibusdam enim ratione sed est sunt fugit accusantium porro incidunt, exercitationem ea repudiandae neque quidem cum, facilis et nam laborum nemo impedit nesciunt. Ipsa, dolores rem?",
            'images' => ['./storage/images/yoi']
        ],
    ]);
})->name('coba');

Route::prefix('/admin')->group(function () {
    Route::controller(AdminLaporanController::class)->group(function () {
        Route::get('/laporan', 'index')->name('admin.laporan.index')->middleware(['auth', 'admin_or_petugas']);
        Route::get('/laporan/edit/{id}', 'edit')->name('admin.laporan.edit')->middleware(['auth', 'admin_or_petugas']);
    });
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth', 'verified', 'admin_or_petugas'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/proses.php';
