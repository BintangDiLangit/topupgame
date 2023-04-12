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
        $blogKategoris = $blogKategoris->getAllData();
        return view('admin.blog.kategori-blog.index', compact('blogKategoris'));
    }

    public function store(Request $request)
    {
        $kategori = new BlogKategoriHelper();
        $kategori->store($request->all());
        return redirect()->back();
    }
}
