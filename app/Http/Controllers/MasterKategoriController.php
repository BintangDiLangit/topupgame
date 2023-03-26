<?php

namespace App\Http\Controllers;

use App\Helpers\MasterKategoriHelper;
use Illuminate\Http\Request;

class MasterKategoriController extends Controller
{
    public function index()
    {

        $masterKategoris = new MasterKategoriHelper();
        $masterKategoris = $masterKategoris->listMKAdmin();
        return view('admin.master_kategori.index', compact('masterKategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_master_kategori' => 'required|max:255',
            'desc' => 'nullable',
            'image_master_kategori' => 'required|mimes:png,jpg,jpeg,gif',
            'status' => 'required|IN:active,disabled',
        ]);

        $masterKategori = new MasterKategoriHelper();
        $masterKategori->storeData($request->all());
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_master_kategori' => 'required|max:255',
            'desc' => 'nullable',
            'image_master_kategori' => 'nullable|mimes:png,jpg,jpeg,gif',
            'status' => 'required|IN:active,disabled',
        ]);
        $masterKategori = new MasterKategoriHelper();
        $masterKategori->updateData($request->all(), $id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $masterKategori = new MasterKategoriHelper();
        $masterKategori->deleteData($id);
        return redirect()->back();
    }
}