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
            'tanggal_lahir' => '2021-01-01',
            'nama_ortu' => 'Ibu Ani',
            'alamat' => 'Jl. Sehat No. 1',
            'posyandu_id' => 1, // pastikan posyandu_id 1 ada
        ]);
    }
}
