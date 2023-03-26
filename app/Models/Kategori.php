<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kategori',
        'slug_kategori',
        'desc',
        'master_kategori_id',
        'image_kategori',
        'status'
    ];

    public function produks()
    {
        return $this->hasMany(Produk::class, 'kategori_id', 'id');
    }

    public function masterKategori()
    {
        return $this->belongsTo(MasterKategori::class,'master_kategori_id','id');
    }
}