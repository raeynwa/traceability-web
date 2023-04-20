<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduk extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_produk',
        'kode_produk',
        'jenis_produk',
        'nama_produk',
        'nama_petani',
        'teknik_budidaya',
        'lokasi_tanam',
        'tanggal_tanam',
        'usia_bulan',
        'usia_hari',
        'kualitas_produk',
        'tanggal_expired'
    ];

    public function produk()
    {
        return $this->hasOne('App\Models\DetailProduk', 'id', 'id_produk');
    }
}
