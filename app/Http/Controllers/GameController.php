<?php

namespace App\Http\Controllers;

use App\Helpers\ApiGamesHelper;
use App\Helpers\ProductHelper;
use App\Helpers\ResellerAPIHelper;
use App\Models\GameDetail;
use App\Models\Games;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function listGame()
    {
        $games = Games::all();
        return view('listgame', compact('games'));
    }

    public function detailGame($gameName, $slug)
    {
        $game = GameDetail::where('slug', $slug)->with('game')->first();
        if (isset($game)) {
            if ($slug == 'diamonds' && $gameName == 'mobile-legend') {
                $mlB = ProductHelper::listProduct('Mobile Legend');
                return view('games.detailgamediamond', compact('game', 'mlB'));
            }
            return view('games.detailgame', compact('game'));
        }
    }

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