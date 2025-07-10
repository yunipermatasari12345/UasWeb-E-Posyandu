<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::updateOrCreate([
            'email' => 'admin@posyandu.test',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Kader
        User::updateOrCreate([
            'email' => 'kader@posyandu.test',
        ], [
            'name' => 'Kader',
            'password' => Hash::make('password'),
            'role' => 'kader',
        ]);

        // Ortu
        User::updateOrCreate([
            'email' => 'ortu@posyandu.test',
        ], [
            'name' => 'Orang Tua',
            'password' => Hash::make('password'),
            'role' => 'ortu',
        ]);

        // Superadmin
        User::updateOrCreate([
            'email' => 'superadmin@posyandu.test',
        ], [
            'name' => 'Super Admin',
            'password' => Hash::make('password'),
            'role' => 'superadmin',
        ]);
    }
}
