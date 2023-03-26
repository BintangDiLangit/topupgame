<?php


namespace App\Helpers;


class StoreImageHelper
{
    public function __invoke($dataImage, $jenis)
    {
        $imageName = uniqid() . time() . '.' . $dataImage->extension();
        $imagePathName = '';
        if ($jenis == 'MK') {
            $dataImage->move(public_path('assets/img/master_kategori'), $imageName);
            $imagePathName = env('APP_URL') . '/assets/img/master_kategori/' . $imageName;
        } elseif ($jenis == 'K') {
            $dataImage->move(public_path('assets/img/kategori'), $imageName);
            $imagePathName = env('APP_URL') . '/assets/img/kategori/' . $imageName;
        } elseif ($jenis == 'P') {
            $dataImage->move(public_path('assets/img/produk'), $imageName);
            $imagePathName = env('APP_URL') . '/assets/img/produk/' . $imageName;
        } else {
            return response()->json([
                'message' => 'Jenis Image Tidak Valid'
            ]);
        }
        return $imagePathName;
    }
}