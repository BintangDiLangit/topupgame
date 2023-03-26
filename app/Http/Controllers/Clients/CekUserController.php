<?php

namespace App\Http\Controllers\Clients;

use App\Helpers\ResellerAPIHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CekUserController extends Controller
{
    public function cekUserML(Request $request)
    {
        $resellerHelper = new ResellerAPIHelper();
        $getNickName = $resellerHelper->getNickName($request->zone_user, $request->id_user);
        if ($getNickName['result'] == true) {
            return $getNickName['data'];
        }
        return false;

        // try {
        //     $apiGames = new ApiGamesHelper();
        //     $getNickName = $apiGames->cekAkunGame('mobilelegend', $request->id_user . $request->zone_user);
        //     if ($getNickName['data']['is_valid']) {
        //         return $getNickName['data']['username'];
        //     }
        // } catch (\Throwable $th) {
        //     return $th->getMessage();
        // }
    }
}
