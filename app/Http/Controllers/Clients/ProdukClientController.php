<?php

namespace App\Http\Controllers\Clients;

use App\Helpers\KategoriHelper;
use App\Helpers\ProdukHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukClientController extends Controller
{
    public function index($mkSlug, $kSlug)
    {
        $kategori = new KategoriHelper();
        $kategori->getDetailKClientBySlug($kSlug);
        $kategori = $kategori->getDetailKClientBySlug($kSlug);

        $produks = new ProdukHelper();
        $produks = $produks->listPClientByKId($kategori->id);
        
        return view('client.produk',compact('produks'));

    }
}
