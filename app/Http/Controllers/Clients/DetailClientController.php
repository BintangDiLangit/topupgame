<?php

namespace App\Http\Controllers\Clients;

use App\Helpers\KategoriHelper;
use App\Helpers\MasterKategoriHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailClientController extends Controller
{
    public function kategori($slug)
    {
        try {
            $MKHelper = new MasterKategoriHelper();
            $MKHelper = $MKHelper->getDetailMKClient($slug);
            $KHelper = new KategoriHelper();
            $KHelper = $KHelper->getKClientByIdMaster($MKHelper->id);
            return view('client.kategori', compact('KHelper'));
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
