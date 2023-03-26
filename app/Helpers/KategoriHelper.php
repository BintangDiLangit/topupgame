<?php

namespace App\Helpers;

use App\Models\Kategori;
use Illuminate\Support\Str;

class KategoriHelper
{
    public function listKAdmin()
    {
        try {
            $kategoris = Kategori::with('masterKategori')->get();
            return $kategoris;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }

    }
    public function getDetailKAdmin($id)
    {
        try {
            $kategori = Kategori::with('masterKategori')->find($id);
            return $kategori;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
    public function storeData($data)
    {
        try {
            $slug = Str::slug($data['nama_kategori']);
            $storeImage = new StoreImageHelper();
            $k = new Kategori();
            $k->master_kategori_id = $data['master_kategori_id'];
            $k->nama_kategori = $data['nama_kategori'];
            $k->desc = $data['desc'];
            $k->status = $data['status'];
            $k->slug_kategori = $slug;
            $k->image_kategori = $storeImage($data['image_kategori'], 'K');
            $k->save();
            return $k;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
    public function updateData($data, $id)
    {
        try {
            $slug = Str::slug($data['nama_kategori']);
            $storeImage = new StoreImageHelper();

            $k = Kategori::find($id);

            $k->master_kategori_id = $data['master_kategori_id'];
            $k->nama_kategori = $data['nama_kategori'];
            $k->desc = $data['desc'];
            $k->status = $data['status'];
            $k->slug_kategori = $slug;
            if (isset($data['image_kategori'])) {
                $k->image_kategori = $storeImage($data['image_kategori'], 'MK');
            }
            $k->save();
            return $k;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function deleteData($id)
    {
        try {
            $mk = Kategori::find($id);
            $mk->delete();
            return $mk;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
    public function listKClient()
    {
        try {
            $kategoris = Kategori::with('masterKategori')->where('status','active')->get();
            return $kategoris;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }

    }
    public function getDetailKClientBySlug($slug)
    {
        try {
            $kategori = Kategori::with('masterKategori')->where([['status','active'],['slug_kategori', $slug]])->first();
            return $kategori;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
    public function getKClientByIdMaster($master_kategori_id)
    {
        try {
            $kategori = Kategori::with('masterKategori', 'produks')->where([['status','active'],['master_kategori_id', $master_kategori_id]])->get();
            return $kategori;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

}