<?php

namespace App\Http\Controllers\Blog;

use App\Helpers\Blog\BlogKategoriHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriBlogController extends Controller
{
    public function index()
    {
        $blogKategoris = new BlogKategoriHelper();
        return view('admin.blog.kategori-blog.index', compact('blogKategoris'));
    }
}
