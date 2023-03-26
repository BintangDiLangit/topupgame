<?php

namespace App\Http\Controllers;

use App\Helpers\KategoriHelper;
use App\Helpers\ProdukHelper;
use App\Helpers\VendorHelper;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = new ProdukHelper();
        $produks = $produks->listPAdmin();
        $vendors  = new VendorHelper();
        $vendors  = $vendors->listVendor();
        $kategoris = new KategoriHelper();
        $kategoris = $kategoris->listKAdmin();
        return view('admin.produk.index', compact('produks','vendors','kategoris'));
    }

    
    public function store(Request $request)
    {
        $produk = new ProdukHelper();
        $produk->storeData($request->all());
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $produk = new ProdukHelper();
        $produk->updateData($request->all(), $id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = new ProdukHelper();
        $produk->deleteData($id);
        return redirect()->back();
    }
}