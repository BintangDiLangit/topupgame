<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('kategoris')->insert([
            'master_kategori_id' => 1,
            'nama_kategori' => 'Twilight Pass',
            'slug_kategori' => 'twilight-pass',
            'desc' => 'tes1',
            'image_kategori' => env('APP_URL') . '/assets/img/kategori/twilight_pass.png',
        ]);

        \DB::table('kategoris')->insert([
            'master_kategori_id' => 1,
            'nama_kategori' => 'Weekly Diamond Pass',
            'slug_kategori' => 'weekly-diamond-pass',
            'desc' => 'tes1',
            'image_kategori' => env('APP_URL') . '/assets/img/kategori/weeklypass.png',
        ]);

        \DB::table('kategoris')->insert([
            'master_kategori_id' => 1,
            'nama_kategori' => 'Diamonds',
            'slug_kategori' => 'diamonds',
            'desc' => 'Top up diamond Mobile Legend yang cepat,
            aman, dan terpercaya. Dengan harga yang terjangkau, Anda dapat membeli diamond untuk
            Mobile
            Legend dengan mudah dan nyaman. Tim kami siap membantu Anda dalam proses pembelian dan
            menjawab segala pertanyaan yang Anda miliki. Selain itu, kami juga menjamin keamanan dan
            kerahasiaan data pelanggan.
            Dapatkan diamond Mobile Legend Anda sekarang dan jadilah juara di game yang Anda
            mainkan!',
            'image_kategori' => env('APP_URL') . '/assets/img/kategori/diamond.png',
        ]);
    }
}