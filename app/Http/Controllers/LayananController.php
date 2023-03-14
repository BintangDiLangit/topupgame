<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LayananController extends Controller
{
    public function listLayananML()
    {
        $sign = md5(env('API_ID_RESELLER') . env('API_KEY_RESELLER'));
        $dataMLB = Http::asForm()->post(env('API_URL_RESELLER') . '/game-feature', [
            'key' => env('API_KEY_RESELLER'),
            'sign' => $sign,
            'type' => 'services',
            'filter_type' => 'game',
            'filter_value' => 'Mobile Legends B',
        ]);

        $dataMLB = $dataMLB->json();
        $dataMLB = $dataMLB['data'];

        $dataMLA = Http::asForm()->post(env('API_URL_RESELLER') . '/game-feature', [
            'key' => env('API_KEY_RESELLER'),
            'sign' => $sign,
            'type' => 'services',
            'filter_type' => 'game',
            'filter_value' => 'Mobile Legends A',
        ]);

        $dataMLA = $dataMLA->json();
        $dataMLA = $dataMLA['data'];

        $dataTP = '';
        $dataWDP = '';


        for ($i = 0; $i < count($dataMLA); $i++) {
            if ($dataMLA[$i]['code'] == 'MLTP-S2') {
                $dataTP = $dataMLA[$i];
            }
            if ($dataMLA[$i]['code'] == 'MLWDP-S2') {
                $dataWDP = $dataMLA[$i];
            }
        }

        $data = ['data_tp' => $dataTP, 'data_wdp' => $dataWDP, 'data_mlb' => $dataMLB];
        return view('games.mobilelegends', compact('data'));
    }
}
