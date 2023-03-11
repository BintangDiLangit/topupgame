<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LayananController extends Controller
{
    public function listLayanan()
    {
        $data = Http::post(env('API_URL_RESELLER').'/game-feature', [
            'key' => env('API_KEY_RESELLER'),
            'sign' => md5(env('API_ID_RESELLER').''.env('API_KEY_RESELLER')),
            'type' => 'services',
            // 'filter_type' => $request->filter_type, // id transaksi
            // 'filter_value' => $request->filter_value, // integer
        ]);
        dd($data->body());
    }
}
