<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\YuniKader;

class YuniKaderSeeder extends Seeder
{
    public function run(): void
    {
        YuniKader::create([
            'nama_kader' => 'Siti',
            'jenis_kelamin' => 'P',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '1990-01-01',
            'alamat' => 'Jl. Sehat No. 2',
            'no_hp' => '08123456789',
            'email' => null,
            'pendidikan' => 'SMA',
            'pekerjaan' => 'Ibu Rumah Tangga',
            'posyandu_id' => 1, // pastikan posyandu_id 1 ada
            'tanggal_bergabung' => '2020-01-01',
        ]);
    }
}
