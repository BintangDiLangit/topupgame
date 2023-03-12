<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function listGame()
    {
        $games = Games::all();
        return view('listgame', compact('games'));
    }

    public function detailGame($slug)
    {
        $game = Games::where($slug)->first();
        if (isset($game)) {
            return view('games.detailgame', compact('game'));
        }
    }
}
