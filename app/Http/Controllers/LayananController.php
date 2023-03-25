<?php

namespace App\Http\Controllers;

use App\Helpers\ProductHelper;
use App\Models\GameDetail;
use App\Models\Games;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LayananController extends Controller
{
    public function listLayananML()
    {
        try {

            $code = '';
            $dataMLB = ProductHelper::getDetailProduct('');
            $dataTP = ProductHelper::getDetailProduct('');
            $dataWDP = ProductHelper::getDetailProduct('');

            $data = ['data_tp' => $dataTP, 'data_wdp' => $dataWDP, 'data_mlb' => $dataMLB, 'data_slug' => $dataSlug];

            return view('games.mobilelegends', compact('data'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}