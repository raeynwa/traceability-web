<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailProduk extends Model
{
    protected $table = 'detail_produk';
    protected $fillable = [
        'id',
        'id_produk',
        'kode_produk',
        'nama_petani',
        'teknik_budidaya',
        'lokasi_tanam',
        'tanggal_tanam',
        'tanggal_panen',
        'usia_bulan',
        'usia_hari',
        'kualitas_produk',
        'tanggal_expired'
    ];

    public function produk()
    {
        return $this->hasOne('App\Models\Produk', 'id', 'id_produk');
    }
}
