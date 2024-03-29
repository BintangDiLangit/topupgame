<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Termwind\Components\Dd;

class ResellerAPIHelper
{
    public static function mobileLegendB()
    {
        try {
            $sign = md5(env('API_ID_RESELLER') . env('API_KEY_RESELLER'));
            $dataMLB = Http::asForm()->post(env('API_URL_RESELLER') . '/game-feature', [
                'key' => env('API_KEY_RESELLER'),
                'sign' => $sign,
                'type' => 'services',
                'filter_type' => 'game',
                'filter_value' => 'Mobile Legends B',
            ]);

            $dataMLB = $dataMLB->json();
            if ($dataMLB['result'] == false) {
            }
            $dataMLB = $dataMLB['data'];
            $dataFilter = [];

            $codes = [
                'ML5_0-S13',
                'ML13_1-S27',
                'ML26_2-S27',
                'ML38_4-S27',
                'ML51_5-S27',
                'ML64_6-S27',
                'ML78_8-S42',
                'ML104_10-S42',
                'ML127_13-S27',
                'ML156_16-S42',
                'ML234_23-S42',
                'ML260_25-S42',
                'ML312_32-S42',
                'ML338_34-S42',
                'ML390_39-S42',
                'ML468_46-S42',
                'ML506_50-S42',
                'ML519_51-S42',
                'ML546_54-S42',
                'ML625_81-S42',
                'ML638_82-S42',
                'ML781_97-S42',
                'ML859_104-S42',
                'ML872_105-S42',
                'ML1015_120-S42',
                'ML1041_122-S42',
                'ML1250_162-S42',
                'ML1288_166-S42',
                'ML1860_335-S42',
                'ML2485_416-S42',
                'ML3099_589-S42',
                'ML3724_670-S42',
                'ML4649_883-S42',
                'ML5274_964-S42',
                'ML6509_1218-S42',
                'ML7740_1548-S42',
                'ML10839_2137-S42',
                'ML15480_3096-S42',
            ];


            foreach ($dataMLB as $data) {
                if (in_array($data['code'], $codes)) {
                    $dataFilter[] = $data;
                }
            }
            return $dataFilter;
        } catch (\Throwable $th) {
            return [
                'status' => 'error',
                'message' => $th->getMessage(),
            ];
        }
    }

    public function getNickName($zone_id, $user_id)
    {
        try {
            $data = Http::asForm()->post(env('API_URL_RESELLER') . '/game-feature', [
                'key' => env('API_KEY_RESELLER'),
                'sign' => md5(env('API_ID_RESELLER') . env('API_KEY_RESELLER')),
                'type' => 'get-nickname',
                'code' => 'mobile-legends',
                'target' => $user_id,
                'additional_target' => $zone_id
            ]);
            $data = $data->json();
            return $data;
        } catch (\Throwable $th) {
            return [
                'status' => 'not found',
                'message'=>'data tidak ditemukan'
            ];
        }
    }

    public function profile()
    {
        $data = Http::asForm()->post(env('API_URL_RESELLER') . '/profile', [
            'key' => env('API_KEY_RESELLER'),
            'sign' => md5(env('API_ID_RESELLER') . env('API_KEY_RESELLER')),
        ]);

        $data = $data->json();
        return $data;
    }

    public static function findMobileLegendB($code)
    {
        $dataMLB = ResellerAPIHelper::mobileLegendB();


        foreach ($dataMLB as $data) {
            if ($data['code'] == $code) {
                return $data;
            }
        }
        return false;
    }

    public function placeOrder($service_id, $data_id_tujuan, $data_zone)
    {
        $data = Http::asForm()->post(env('API_URL_RESELLER') . '/game-feature', [
            'key' => env('API_KEY_RESELLER'),
            'sign' => md5(env('API_ID_RESELLER') . env('API_KEY_RESELLER')),
            'type' => 'order',
            'service' => $service_id,
            'data_no' => $data_id_tujuan,
            'data_zone' => $data_zone
        ]);
        return $data;
    }
    
    public function cekKoneksiVendor($engine)
    {    
        $data = Http::asForm()->get(env('API_GAMES_URL') . '/merchant/' . env('API_GAMES_MERCHANT_ID') . '/cek-koneksi', [
            'engine' => $engine,
            'signature' => md5(env('API_GAMES_MERCHANT_ID') . env('API_GAMES_SECRET_KEY')),
        ]);
        $data = $data->json();
        return $data;
    }
}
