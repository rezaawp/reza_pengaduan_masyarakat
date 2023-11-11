<?php

namespace App\Livewire\Laporan;

use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Log;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $role = fn($r) => Auth::user()->hasRole($r);

        Log::info(Auth::user()->toArray());
        $pengaduan = null;
        if ($role("admin")) {
            Log::info("Masuk ke admin");
            $pengaduan = Pengaduan::with(['images', 'masyarakat.user'])->orderBy('id_pengaduan', 'DESC')->cursorPaginate(10);
        } elseif ($role("masyarakat")) {
            Log::info('masuk ke masyarakat');
            $user = Auth::user()->load(['masyarakat']);
            $pengaduan = Pengaduan::where('nik', $user['masyarakat']['nik'])->with(['images', 'tanggapan.petugas.user'])->orderBy('id_pengaduan', 'DESC')->cursorPaginate(10);
        }


        return view('livewire.laporan.index', ['pengaduan' => $pengaduan]);
    }
}
