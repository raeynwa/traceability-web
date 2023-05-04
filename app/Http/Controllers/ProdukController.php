<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Helpers\Helpers;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Produk::orderBy('updated_at', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('jenis_produk', function ($e) {
                    return Helpers::_jenis_produk($e['jenis_produk']);
                })
                ->addColumn('action', function ($e) {
                    $btn = '
                    <div class="btn-group">
                    <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $e->id . '" data-call="' . $e->nama_produk . '" data-original-title="Edit" title="Edit" class="btn btn-sm btn-warning btnEdit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $e->id . '" data-call="' . $e->nama_produk . '" data-original-title="Hapus" title="Hapus" class="btn btn-sm btn-danger btnHapus">
                        <i class="fas fa-trash"></i>
                    </a>
                    </div>';
                    return $btn;
                })
                ->make(true);
        }
        $header = 'Data Produk';
        return view('pages.produk.index', compact('header'));
    }

    public function store(Request $request)
    {
        if ($request->nama_produk == '') {
            $returnData = array(
                "status"      => "error",
                "code"    => "422",
                "message"   => ['nama_produk' => "Nama produk wajib diisi"]
            );
            return response($returnData, 422);
        }

        if ($request->jenis_produk == '') {
            $returnData = array(
                "status"      => "error",
                "code"    => "422",
                "message"   => ['jenis_produk' => "Jenis produk wajib diisi"]
            );
            return response($returnData, 422);
        }

        $create = Produk::create([
            'nama_produk'          => $request->nama_produk,
            'jenis_produk'         => $request->jenis_produk,
        ]);

        if ($create) {
            return response()->json([
                'title'     => 'Berhasil',
                'status'    => 'created',
                'message'   => 'Data Berhasil disimpan'
            ], 201);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Something Wrong.'
        ], 400);
    }
}
