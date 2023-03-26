<?php

namespace App\Helpers;

use App\Models\Produk;
use Illuminate\Support\Str;

class ProdukHelper
{
    public function listPAdmin()
    {
        $produks = \DB::table('produks as p')
        ->leftJoin('vendors as v', 'p.vendor_id', '=', 'v.id')
        ->select('p.*', 'v.nama as nama_vendor')
        ->get();
        return $produks;
    }
    public function getDetailPAdmin($id)
    {
        $produk = \DB::table('produks as p')
        ->leftJoin('vendors as v', 'p.vendor_id', '=', 'o.id')
        ->select('p.*', 'o.nama as nama_vendor')->find('id');
        return $produk;
    }
    public function storeData($data)
    {
        try {
            $slug = Str::slug($data['nama']);

            $p = new Produk();

            $p->code = $data['code'];
            $p->nama = $data['nama'];
            $p->vendor_id = $data['vendor_id'];
            $p->kategori_id = $data['kategori_id'];
            $p->jumlah = $data['jumlah'];
            $p->harga_beli = $data['harga_beli'];
            $p->harga_jual = $data['harga_jual'];
            $p->price_unit = $data['price_unit'];
            $p->slug = $slug;
            $p->status = $data['status'];
            $p->desc = $data['desc'];
            $p->save();
            return $p;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function updateData($data, $id)
    {
     
        try {
            $slug = Str::slug($data['nama']);

            $p = Produk::find($id);
            $p->code = $data['code'];
            $p->nama = $data['nama'];
            $p->vendor_id = $data['vendor_id'];
            $p->kategori_id = $data['kategori_id'];
            $p->jumlah = $data['jumlah'];
            $p->harga_beli = $data['harga_beli'];
            $p->harga_jual = $data['harga_jual'];
            $p->price_unit = $data['price_unit'];
            $p->slug = $slug;
            $p->status = $data['status'];
            $p->desc = $data['desc'];
            $p->save();
            return $p;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function deleteData($id)
    {
        try {
            $p = Produk::find($id);
            $p->delete();
            return $p;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
    public function listPClientByKId($kategori_id)
    {
        $products = Produk::with('kategori.masterKategori')->where([['status', 'active'],['kategori_id', $kategori_id]])->get();
        return $products;
    }
    public function getDetailPClient($id)
    {
        $products = Produk::with('kategori.masterKategori')->where('status', 'active')->find('id');
        return $products;
    }

    public function getDetailPClientByCode($code)
    {
        $products = Produk::with('kategori.masterKategori')->where([['status', 'active'],['code',$code]])->first();
        return $products;
    }



}