<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Petugas::create([
            'telp' => '08571231231',
            'level' => 'admin',
            'user_id' => 1
        ]);

        Petugas::create([
            'telp' => '08571231299',
            'level' => 'petugas',
            'user_id' => 2
        ]);
    }
}
