<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    protected $table = 'tanggapan';
    protected $primaryKey = 'id_tanggapan';
    protected $guarded = ['id_tanggapan'];

    function petugas() {
        return $this->belongsTo(Petugas::class, 'id_petugas', 'id_petugas');
    }
}
