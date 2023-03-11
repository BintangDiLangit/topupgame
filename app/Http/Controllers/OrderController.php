<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $data = Http::post(env('API_URL_RESELLER').'/game-feature', [
            'key' => env('API_KEY_RESELLER'),
            'sign' => md5(env('API_ID_RESELLER').env('API_KEY_RESELLER')),
            'type' => 'order',
            'service' => $request->service_id,
            'data_no' => $request->data_id_tujuan,
            'data_zone' => $request->data_zone
        ]);

        // dd(env('API_ID_RESELLER').env('API_KEY_RESELLER'));
        dd($data->body());
    }

    public function statusOrder(Request $request)
    {
        $data = Http::post(env('API_URL_RESELLER').'/game-feature', [
            'key' => env('API_KEY_RESELLER'),
            'sign' => md5(env('API_ID_RESELLER').env('API_KEY_RESELLER')),
            'type' => 'status',
            'trxid' => $request->transaksi_id, // id transaksi
            // 'limit' => $request->data_id_tujuan, // integer
        ]);

        // dd(env('API_ID_RESELLER').env('API_KEY_RESELLER'));
        dd($data->body());
    }
}
