<?php

namespace App\Http\Controllers\Clients;

use App\Helpers\ApiGamesHelper;
use App\Helpers\ProdukHelper;
use App\Helpers\ResellerAPIHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CekUserController extends Controller
{
    public function cekUserML(Request $request)
    {
        try {
            $productHelper = new ProdukHelper();

            $parts = explode(';', $request->game_code);
            $code = $parts[0];
            $value = $productHelper->getDetailPClientByCode($code);
            $hargaJual = $value['harga_jual'];
            $jumlah = $value['jumlah'];
            $resellerHelper = new ResellerAPIHelper();
            $getNickName = $resellerHelper->getNickName($request->zone_user, $request->id_user);
            if ($getNickName['result'] == true) {
                return [
                    'nickname' => $getNickName['data'],
                    'user_id' => $request->id_user,
                    'zone_id' => $request->zone_user,
                    'email' => $request->email,
                    'harga' => $hargaJual,
                    'jumlah' => $jumlah,
                ];
            }else {
                $apiGames = new ApiGamesHelper();
                $getNickName = $apiGames->cekAkunGame('mobilelegend', $request->id_user . $request->zone_user);
                if ($getNickName['data']['is_valid']) {
                    return [
                        'nickname' => $getNickName['data']['username'],
                        'user_id' => $request->id_user,
                        'zone_id' => $request->zone_user,
                        'email' => $request->email,
                        'harga' => $hargaJual,
                        'jumlah' => $jumlah,
                    ];
                } else {
                    return [
                        'status' => 'not found',
                        'message'=>'data tidak ditemukan'
                    ];
                }
            }

        } catch (\Throwable $th) {
            return [
                'message'=> 'Silahkan input data yang sesuai',
                    'status' => 'Data akun kamu tidak ada'
            ];
        }
    }
}
