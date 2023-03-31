<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function index()
    {
        return view('admin.blog.komentar.index');
    }
}
