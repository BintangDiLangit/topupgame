<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKategori extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_master_kategori',
        'slug_master_kategori',
        'desc',
        'image_master_kategori',
        'status'
    ];
}