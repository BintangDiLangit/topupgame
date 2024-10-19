<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('users')->insert([
            'name' => 'Bintang Miftaqul Huda',
            'email' => 'bintangmfhd@gmail.com',
            'password' => bcrypt('hfe8we8fujewfGUGU5^'),
            'role_id' => 1,
            'email_verified_at' => now(),
            'role_id' => 1,
        ]);
    }
}
