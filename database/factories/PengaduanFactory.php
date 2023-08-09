<?php

namespace Database\Factories;

use App\Models\Masyarakat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengaduan>
 */
class PengaduanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tgl_pengaduan' => fake()->date(),
            'nik' => Masyarakat::all()->random()->nik,
            'isi_laporan' => fake()->realTextBetween(11, 200),
            'lokasi_pengaduan' => fake()->text(200),
            'foto' => fake()->text(10),
        ];
    }
}
