<?php

namespace App\Helpers;

use App\Models\Produk;


class ProductHelper
{
    public static function listProduct()
    {
        $keuntungan = 0.05;
        $products = Produk::select(
            'id',
            'code',
            'nama',
            'jumlah',
            'price_unit',
            'harga_rupiah as harga_beli',
            'slug',
            'brand',
            'status',
        )->addSelect(\DB::raw('CEIL((harga_rupiah*' . $keuntungan . ') + harga_rupiah) as harga_jual'))
            ->where('status', 'active')->get();
        return $products;
    }

    public static function getDetailProduct($code)
    {
        $keuntungan = 0.05;
        $products = Produk::select(
            'id',
            'code',
            'nama',
            'jumlah',
            'price_unit',
            'harga_rupiah as harga_beli',
            'slug',
            'brand',
            'status',
        )->addSelect(\DB::raw('CEIL((harga_rupiah*' . $keuntungan . ') + harga_rupiah) as harga_jual'))
            ->where([['status', 'active'], ['code', $code]])->first();
        return $products;
    }

}