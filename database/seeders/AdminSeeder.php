<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nik' => '1234567890123456',
            'nama' => 'Admin Notaris',
            'email' => 'admin@notaris.test',
            'password' => Hash::make('admin123'), // password = admin123
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'nik' => '6543210987654321',
            'nama' => 'Super Admin Notaris',
            'email' => 'superadmin@notaris.test',
            'password' => Hash::make('superadmin123'), // password = superadmin123
            'role' => 'superAdmin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
