<?php

namespace App\Helpers;
use App\Models\Vendor;

class VendorHelper{

    public function listVendor()
    {
        try {
            $masterKategoris = Vendor::all();
            return $masterKategoris;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }

    }

    public function getDetailVendor($id)
    {
        try {
            $masterKategori = Vendor::find($id);
            return $masterKategori;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function storeData($data)
    {
        try {
            $mk = new Vendor();
            $mk->nama = $data['nama'];
            $mk->sumber = $data['sumber'];
            $mk->save();
            return $mk;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function updateData($data, $id)
    {
     
        try {
            $mk = Vendor::find($id);
            $mk->nama = $data['nama'];
            $mk->sumber = $data['sumber'];
            $mk->save();
            return $mk;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function deleteData($id)
    {
        try {
            $mk = Vendor::find($id);
            $mk->delete();
            return $mk;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
}