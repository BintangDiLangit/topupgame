<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GetNickNameController extends Controller
{
    public function getNickNameMobileLegend(Request $request)
    {
        $data = Http::asForm()->post(env('API_URL_RESELLER') . '/game-feature', [
            'key' => env('API_KEY_RESELLER'),
            'sign' => md5(env('API_ID_RESELLER') . env('API_KEY_RESELLER')),
            'type' => 'get-nickname',
            'code' => 'mobile-legend',
            'target' => $request->user_id,
            'additional_target' => $request->zone_id
        ]);
        dd($data->body());
    }
}
