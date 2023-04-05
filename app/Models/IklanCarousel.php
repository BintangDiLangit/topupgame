<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IklanCarousel extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function masterKategori()
    {
        return $this->belongsTo(MasterKategori::class,'master_kategori_id','id');
    }
}
