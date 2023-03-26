<?php

namespace App\Http\Controllers\Clients;

use App\Helpers\MasterKategoriHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        try {
            $masterKategoris = new MasterKategoriHelper();
            $masterKategoris = $masterKategoris->listMKClient();
            return view('main', compact('masterKategoris'));
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendMessage(Request $request)
    {

    }
}