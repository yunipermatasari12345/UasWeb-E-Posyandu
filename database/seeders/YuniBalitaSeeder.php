<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\YuniBalita;

class YuniBalitaSeeder extends Seeder
{
    public function run(): void
    {
        YuniBalita::create([
            'nama_balita' => 'Budi',
            'jenis_kelamin' => 'L',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '2021-01-01',
            'berat_lahir' => 3.2,
            'panjang_lahir' => 49.5,
            'umur' => 36,
            'nama_ortu' => 'Ibu Ani',
            'no_hp_ortu' => '08123456789',
            'alamat' => 'Jl. Sehat No. 1',
            'posyandu_id' => 1, // pastikan posyandu_id 1 ada
            'catatan' => null,
        ]);
    }
}
