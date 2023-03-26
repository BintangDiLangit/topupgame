<?php

namespace App\Helpers;

use App\Models\MasterKategori;
use Illuminate\Support\Str;


class MasterKategoriHelper
{
    public function listMKAdmin()
    {
        try {
            $masterKategoris = MasterKategori::all();
            return $masterKategoris;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }

    }

    public function getDetailMKAdmin($id)
    {
        try {
            $masterKategori = MasterKategori::find($id);
            return $masterKategori;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function storeData($data)
    {
        try {
            $slug = Str::slug($data['nama_master_kategori']);
            $storeImage = new StoreImageHelper();

            $mk = new MasterKategori();

            $mk->nama_master_kategori = $data['nama_master_kategori'];
            $mk->desc = $data['desc'];
            $mk->status = $data['status'];
            $mk->slug_master_kategori = $slug;
            $mk->image_master_kategori = $storeImage($data['image_master_kategori'], 'MK');
            $mk->save();
            return $mk;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function updateData($data, $id)
    {
     
        try {
            $slug = Str::slug($data['nama_master_kategori']);
            $storeImage = new StoreImageHelper();

            $mk = MasterKategori::find($id);

            $mk->nama_master_kategori = $data['nama_master_kategori'];
            $mk->desc = $data['desc'];
            $mk->status = $data['status'];
            $mk->slug_master_kategori = $slug;
            if (isset($data['image_master_kategori'])) {
                $mk->image_master_kategori = $storeImage($data['image_master_kategori'], 'MK');
            }
            $mk->save();
            return $mk;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function deleteData($id)
    {
        try {
            $mk = MasterKategori::find($id);
            $mk->delete();
            return $mk;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function listMKClient()
    {
        try {
            $masterKategoris = MasterKategori::where('status','active')->get();
            return $masterKategoris;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }

    }
    public function getDetailMKClient($slug)
    {
        try {
            $masterKategori = MasterKategori::where([['status','active'],['slug_master_kategori', $slug]])->first();
            return $masterKategori;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

}