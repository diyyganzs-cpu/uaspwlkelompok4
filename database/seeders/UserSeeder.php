<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nik' => '1901202123819312',
            'name' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'no_hp' => '081234567890',
            'alamat' => 'Kantor Kecamatan',
            'password' => Hash::make('12345678'),
            'role' => 'petugas',
        ]);
    }
}