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
    protected $listeners = ['terima' => 'terima'];

    public $diTerima = false;


    function terima($val)
    {
        Log::info("Terima listen");
        $this->diTerima = true;
    }

    public function render()
    {
        $role = fn($r) => Auth::user()->hasRole($r);

        $pengaduan = null;
        if ($role("admin")) {
            $pengaduan = Pengaduan::with(['images', 'masyarakat.user'])->orderBy('id_pengaduan', 'DESC')->cursorPaginate(10);
        } elseif ($role("masyarakat")) {
            $user = Auth::user()->load(['masyarakat']);
            $pengaduan = Pengaduan::where('nik', $user['masyarakat']['nik'])->with(['images', 'tanggapan.petugas.user'])->orderBy('id_pengaduan', 'DESC')->cursorPaginate(10);
        }


        return view('livewire.laporan.index', ['pengaduan' => $pengaduan]);
    }
}
