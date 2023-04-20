<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'jenis_produk',
        'nama_produk'
    ];

    public function detail_produk()
    {
        return $this->belongsTo('App\Models\DetailProduk', 'id', 'id_produk');
    }
}
