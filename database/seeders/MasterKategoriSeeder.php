<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('master_kategoris')->insert([
            'nama_master_kategori' => 'Mobile Legends: Bang Bang',
            'image_master_kategori' => env('APP_URL') . '/assets/img/master_kategori/mobile-legend.jpg',
            'desc' => 'Desc Test',
            'slug_master_kategori' => 'mobile-legend',
        ]);
    }
}