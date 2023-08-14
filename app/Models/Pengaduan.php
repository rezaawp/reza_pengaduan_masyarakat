<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';

    function images() {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }
}
