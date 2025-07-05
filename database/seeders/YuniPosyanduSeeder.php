<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\YuniPosyandu;

class YuniPosyanduSeeder extends Seeder
{
    public function run(): void
    {
        YuniPosyandu::create([
            'nama_posyandu' => 'Posyandu Mawar',
            'alamat' => 'Jl. Sehat No. 1',
            'kelurahan' => 'Kelurahan Sehat',
        ]);
    }
}
