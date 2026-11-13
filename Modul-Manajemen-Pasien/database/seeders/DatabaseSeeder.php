<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
        'name' => 'Admin Klinik',
        'email' => 'admin@klinik.test',
        'password' => bcrypt('password123'),
        'role' => 'admin',
    ]);

    \App\Models\User::create([
        'name' => 'Petugas Pendaftaran',
        'email' => 'petugas@klinik.test',
        'password' => bcrypt('password123'),
        'role' => 'petugas',
    ]);

    \App\Models\User::create([
        'name' => 'Dokter Klinik',
        'email' => 'dokter@klinik.test',
        'password' => bcrypt('password123'),
        'role' => 'dokter',
    ]);
    }
}
