<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\YuniBalita;
use App\Models\YuniKader;
use App\Models\YuniPemeriksaan;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'), // password: password
            'role' => 'admin',
        ]);

        // Buat contoh data pemeriksaan jika ada balita dan kader
        $balita = YuniBalita::first();
        $kader = YuniKader::first();
        if ($balita && $kader) {
            YuniPemeriksaan::create([
                'balita_id' => $balita->id,
                'kader_id' => $kader->id,
                'user_id' => $admin->id,
                'tanggal' => now()->toDateString(),
                'berat_badan' => 8.5,
                'tinggi_badan' => 70.2,
                'catatan' => 'Pemeriksaan awal oleh admin',
            ]);
        }
    }
}
