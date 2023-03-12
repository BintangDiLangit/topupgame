<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $games = Games::all();
        return view('main', compact('games'));
    }

    public function about()
    {
        return view('about');
    }
}
