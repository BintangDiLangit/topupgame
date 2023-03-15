<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('game_details')->insert([
            'game_id' => 1,
            'name' => 'Twilight Pass',
            'slug' => 'twilight-pass',
            'desc' => 'tes1'
        ]);

        DB::table('game_details')->insert([
            'game_id' => 1,
            'name' => 'Weekly Diamond Pass',
            'slug' => 'weekly-diamond-pass',
            'desc' => 'tes1'
        ]);

        DB::table('game_details')->insert([
            'game_id' => 1,
            'name' => 'Diamonds',
            'slug' => 'diamonds',
            'desc' => 'tes1'
        ]);
    }
}
