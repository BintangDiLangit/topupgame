<?php

namespace App\Helpers;

use App\Models\Produk;


class ProductHelper
{
    public static function listProduct($brand)
    {
        $products = Produk::select(
            'id',
            'code',
            'nama',
            'jumlah',
            'price_unit',
            'harga_rupiah as harga_beli',
            'harga_jual',
            'slug',
            'brand',
            'status',
        )->where([['status', 'active'], ['brand', $brand]])->get();
        return $products;
    }

    public static function listAllProduct()
    {
        $products = Produk::select(
            'id',
            'code',
            'nama',
            'jumlah',
            'price_unit',
            'harga_rupiah as harga_beli',
            'harga_jual',
            'slug',
            'brand',
            'status',
        )->get();
        return $products;
    }

    public static function getDetailProduct($code)
    {
        $products = Produk::select(
            'id',
            'code',
            'nama',
            'jumlah',
            'price_unit',
            'harga_rupiah as harga_beli',
            'harga_jual',
            'slug',
            'brand',
            'status',
        )->where([['status', 'active'], ['code', $code]])->first();
        return $products;
    }

}