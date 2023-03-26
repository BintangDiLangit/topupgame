<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'nama',
        'vendor_id',
        'kategori_id',
        'jumlah',
        'harga_beli',
        'harga_jual',
        'price_unit',
        'slug',
        'status',
        'desc',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}