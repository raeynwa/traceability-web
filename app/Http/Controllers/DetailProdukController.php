<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailProdukController extends Controller
{
    public function index()
    {
        $header = "Detail Produk";
        return view('pages.detail_produk.index', compact('header'));
    }
}
