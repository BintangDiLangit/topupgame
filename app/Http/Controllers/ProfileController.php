<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public function profile()
    {
        $data = Http::asForm()->post(env('API_URL_RESELLER').'/profile', [
            'key' => env('API_KEY_RESELLER'),
            'sign' => md5(env('API_ID_RESELLER').env('API_KEY_RESELLER')),
        ]);

        // dd(env('API_ID_RESELLER').env('API_KEY_RESELLER'));
        dd($data->body());
    }
}