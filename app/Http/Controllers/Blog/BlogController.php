<?php

namespace App\Http\Controllers\Blog;

use App\Helpers\Blog\BlogHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = new BlogHelper();
        return view('admin.blog.blog.index');
    }
}
