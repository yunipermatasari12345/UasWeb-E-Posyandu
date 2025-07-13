<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\YuniAdmin;
use App\Models\YuniKader;
use App\Models\YuniPosyandu;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user admin
        $adminUser = User::create([
            'name' => 'Admin Posyandu',
            'email' => 'admin@posyandu.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Buat data admin
        YuniAdmin::create([
            'user_id' => $adminUser->id,
            'nip' => '198501012010012001',
            'jabatan' => 'Admin Utama Posyandu',
            'unit_kerja' => 'Dinas Kesehatan',
            'tanggal_bergabung' => '2020-01-01',
            'status_aktif' => 'aktif',
            'catatan' => 'Admin utama sistem posyandu',
        ]);

        // Buat user kader
        $kaderUser = User::create([
            'name' => 'Kader Posyandu',
            'email' => 'kader@posyandu.com',
            'password' => Hash::make('password'),
            'role' => 'kader',
        ]);

        // Buat posyandu contoh
        $posyandu = YuniPosyandu::firstOrCreate([
            'nama_posyandu' => 'Posyandu Melati',
            'alamat' => 'Jl. Melati No. 123',
            'kelurahan' => 'Melati',
            'kecamatan' => 'Bandung Wetan',
        ]);

        // Buat data kader
        YuniKader::create([
            'nama_kader' => 'Siti Nurhaliza',
            'jenis_kelamin' => 'Perempuan',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '1985-05-15',
            'alamat' => 'Jl. Kader No. 45',
            'no_hp' => '081234567890',
            'email' => 'kader@posyandu.com',
            'pendidikan' => 'SMA',
            'pekerjaan' => 'Kader Posyandu',
            'posyandu_id' => $posyandu->id,
            'user_id' => $kaderUser->id,
            'tanggal_bergabung' => '2021-03-01',
        ]);

        $this->command->info('Data admin dan kader berhasil dibuat!');
        $this->command->info('Email: admin@posyandu.com, Password: password');
        $this->command->info('Email: kader@posyandu.com, Password: password');
    }
}
