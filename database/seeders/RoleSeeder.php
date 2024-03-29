<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('roles')->insert([
            'nama_role' => 'Super Admin',
        ]);

        \DB::table('roles')->insert([
            'nama_role' => 'Admin',
        ]);

        \DB::table('roles')->insert([
            'nama_role' => 'Marketing',
        ]);

        \DB::table('roles')->insert([
            'nama_role' => 'Member',
        ]);
    }
}
