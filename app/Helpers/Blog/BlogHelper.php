<?php 


namespace App\Helpers\Blog;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogHelper{

    public function getAllData()
    {
        $dataKategori = Blog::orderBy('created_at','desc')->get();
        return $dataKategori;
    }

    public function store($data)
    {
        $kategori = Blog::create([
            'user_id' => $data['user_id'],
            'kategori_blog_id' => $data['kategori_blog_id'],
            'title' => $data['title'],
            'slug' => Str::slug($data['title']),
            'body' => $data['body'],
        ]);
        return $kategori;
    }

    public function update($data, $id)
    {
        $kategori = Blog::find($id);
        $kategori->update([
            'nama' => $data['nama'],
            'slug' => Str::slug($data['nama']),
        ]);
        return $kategori;
    }

    public function destroy($id)
    {
        $kategori = Blog::find($id);
        $kategori->delete();
        return true;
    }
}