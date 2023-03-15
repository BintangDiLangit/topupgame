<?php

namespace App\Http\Controllers;

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
                $mlB = ResellerAPIHelper::mobileLegendB();
                return view('games.detailgamediamond', compact('game', 'mlB'));
            }
            return view('games.detailgame', compact('game'));
        }
    }
}
