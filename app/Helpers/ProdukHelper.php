<?php

namespace App\Helpers;

use App\Models\Produk;
use Illuminate\Support\Str;

class ProdukHelper
{
    protected $kursSoc;
    protected $untung;
    public function __construct()
    {
        $this->kursSoc = 294;
        $this->untung = 0.07;

    }
    public function listPAdmin()
    {
        $kursSoc = $this->kursSoc;
        $untung = $this->untung;
        $produks = \DB::table('produks as p')
        ->leftJoin('vendors as v', 'p.vendor_id', '=', 'v.id')
        ->selectRaw('p.jumlah, p.price_unit,p.id, p.code, p.nama, p.kategori_id, p.vendor_id, p.status, p.harga_beli as harga_beli 
        , v.nama as nama_vendor, p.harga_beli*'.$kursSoc.' as harga_beli_rp,p.desc, (p.harga_beli*'. $kursSoc * $untung.') +
        p.harga_beli*'.$kursSoc.' as harga_jual')
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
        $kursSoc = $this->kursSoc;
        $untung = $this->untung;
        $products = Produk::with('kategori.masterKategori')
        ->leftJoin('vendors as v', 'produks.vendor_id', '=', 'v.id')
        ->where([
            ['produks.status', 'active'],
            ['produks.kategori_id', $kategori_id]
        ])
        ->selectRaw('produks.jumlah, produks.price_unit, produks.id, produks.code, produks.nama, 
        produks.kategori_id, produks.vendor_id, produks.status, v.nama as nama_vendor, produks.harga_beli as harga_beli,
        (produks.harga_beli * '.$kursSoc.') as harga_beli_rp, produks.desc, ((produks.harga_beli * '.$kursSoc.') * '.$untung.' ) + 
        (produks.harga_beli * '.$kursSoc.') as harga_jual')
        ->get();
        
        return $products;
    }
    public function getDetailPClient($id)
    {
        $products = Produk::with('kategori.masterKategori')->where('status', 'active')->find('id');
        return $products;
    }

    public function getDetailPClientByCode($code)
    {
        
        $kursSoc = $this->kursSoc;
        $untung = $this->untung;
        $products = Produk::with('kategori.masterKategori')
        ->leftJoin('vendors as v', 'produks.vendor_id', '=', 'v.id')
        ->where([
            ['produks.status', 'active'],
            ['produks.code', $code]
        ])
        ->selectRaw('produks.jumlah, produks.price_unit, produks.id, produks.code, produks.nama, 
        produks.kategori_id, produks.vendor_id, produks.status, v.nama as nama_vendor, produks.harga_beli as harga_beli,
        (produks.harga_beli * '.$kursSoc.') as harga_beli_rp, produks.desc, ((produks.harga_beli * '.$kursSoc.') * '.$untung.' ) + 
        (produks.harga_beli * '.$kursSoc.') as harga_jual')
        ->first();
        return $products;
    }



}