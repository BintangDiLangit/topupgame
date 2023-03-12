<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('games')->insert([
            'name' => 'Mobile Legends: Bang Bang',
            'image' => env('APP_URL') . '/assets/img/nft/mobile-legend.jpg',
            'description' => 'Desc Test',
            'slug' => 'mobile-legend',
        ]);
    }
}
