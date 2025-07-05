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
            'no_hp' => '08123456789',
            'posyandu_id' => 1, // pastikan posyandu_id 1 ada
        ]);
    }
}
