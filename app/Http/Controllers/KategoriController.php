<?php

namespace App\Http\Controllers;

use App\Helpers\KategoriHelper;
use App\Helpers\MasterKategoriHelper;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = new KategoriHelper();
        $kategoris = $kategoris->listKAdmin();
        $masterKategoris = new MasterKategoriHelper();
        $masterKategoris = $masterKategoris->listMKAdmin();
        return view('admin.kategori.index', compact('kategoris','masterKategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'master_kategori_id' => 'required|numeric',
            'nama_kategori' => 'required|max:255',
            'desc' => 'nullable',
            'image_kategori' => 'required|mimes:png,jpg,jpeg,gif',
            'status' => 'required|IN:active,disabled',
        ]);

        $kategori = new KategoriHelper();
        $kategori->storeData($request->all());
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'master_kategori_id' => 'required|numeric',
            'nama_kategori' => 'required|max:255',
            'desc' => 'nullable',
            'image_kategori' => 'nullable|mimes:png,jpg,jpeg,gif',
            'status' => 'required|IN:active,disabled',
        ]);
        $kategori = new KategoriHelper();
        $kategori->updateData($request->all(), $id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $kategori = new KategoriHelper();
        $kategori->deleteData($id);
        return redirect()->back();
    }
}