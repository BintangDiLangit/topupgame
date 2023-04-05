<?php 

namespace App\Helpers\Admin;
use App\Helpers\StoreImageHelper;
use App\Models\IklanCarousel;
class IklanCarouselHelper{

    public function listForAdmin()
    {
        $carousel = IklanCarousel::with('masterKategori')->orderBy('created_at','desc')->get();
        return $carousel;
    }
    public function store($reqData)
    {
        try {
            $storeImage = new StoreImageHelper();
            $data = new IklanCarousel();
            
            $data->master_kategori_id = $reqData['master_kategori_id'];
            $data->nama_iklan = $reqData['nama_iklan'];
            $data->image = $storeImage($reqData['image'], 'IKLANWEB');
            if ($reqData['link']) {
                $data->link = $reqData['link'];
            }
            $data->status = $reqData['status'];
            $data->save();
    
            return $data;
        } catch (\Throwable $th) {
            return [
                'status' => 'error',
                'message' => $th->getMessage(),
            ];
        }

    }
    public function update($reqData, $id)
    {
        try {
            $data = IklanCarousel::find($id);
            
            $data->master_kategori_id = $reqData['master_kategori_id'];
            $data->nama_iklan = $reqData['nama_iklan'];
            if (isset($reqData['image'])) {
                $storeImage = new StoreImageHelper();
                $data->image = $storeImage($reqData['image'], 'IKLANWEB');
            }
            if ($reqData['link']) {
                $data->link = $reqData['link'];
            }
            $data->status = $reqData['status'];
            $data->save();
    
            return $data;
        } catch (\Throwable $th) {
            return [
                'status' => 'error',
                'message' => $th->getMessage(),
            ];
        }
    }
    
    public function listForClient($masterKategoriId)
    {
        $carousel = IklanCarousel::where([['status',1],['master_kategori_id', $masterKategoriId]])->orderBy('created_at','desc')->get();
        return $carousel;
    }

    public function delete($id)
    {
        $data = IklanCarousel::find($id);
        $data->delete();
        return true;
    }
}