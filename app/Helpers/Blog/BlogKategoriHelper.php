<?php 


namespace App\Helpers\Blog;
use App\Models\KategoriBlog;
use Illuminate\Support\Str;

class BlogKategoriHelper{

    public function getAllData()
    {
        $dataKategori = KategoriBlog::orderBy('created_at','desc')->get();
        return $dataKategori;
    }

    public function store($data)
    {
        $kategori = KategoriBlog::create([
            'nama' => $data['nama'],
            'slug' => Str::slug($data['nama']),
        ]);
        return $kategori;
    }

    public function update($data, $id)
    {
        $kategori = KategoriBlog::find($id);
        $kategori->update([
            'nama' => $data['nama'],
            'slug' => Str::slug($data['nama']),
        ]);
        return $kategori;
    }

    public function destroy($id)
    {
        $kategori = KategoriBlog::find($id);
        $kategori->delete();
        return true;
    }
}