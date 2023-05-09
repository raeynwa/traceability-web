<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Helpers\Helpers;
use App\Models\DetailProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;

class DetailProdukController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DetailProduk::orderBy('updated_at', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
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
        $header = "Detail Produk";
        return view('pages.detail_produk.index', compact('header'));
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
                'status'    => 'success',
                'message'   => 'Data Berhasil disimpan'
            ], 201);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Something Wrong.'
        ], 400);
    }

    public function edit(Request $request)
    {
        if ($request->id != '') {
            $data = Produk::where('id', $request->id)->first();
            if (isset($data)) {
                $returnData = array(
                    "status"  => "success",
                    "code"    => "200",
                    "data"    => $data
                );
                return response($returnData, 200);
            } else {
                $returnData = array(
                    "status"  => "not found",
                    "code"    => "404",
                    'message' => 'Data tidak ditemukan'
                );
                return response($returnData, 404);
            }
        } else {
            $returnData = array(
                "status"  => "success",
                "code"    => "400",
                'message' => 'ID kosong'
            );
            return response($returnData, 400);
        }
    }

    public function update(Request $request)
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

        $data = Produk::where('id', $request->id)->first();
        $data->nama_produk = $request->nama_produk;
        $data->jenis_produk = $request->jenis_produk;
        $data->updated_at = Carbon::now();

        if ($data->save()) {
            return response()->json([
                'title'     => 'Berhasil',
                'status'    => 'success',
                'message'   => 'Data Berhasil disimpan'
            ], 201);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Something Wrong.'
        ], 400);
    }

    public function delete(Request $request)
    {
        $data = DetailProduk::where('id_produk', $request->id)->count();
        if ($data < 1) {
            $produk = Produk::where('id', $request->id)->first();

            if ($produk->delete()) {
                return response()->json([
                    'status'    => 'success',
                    'message'   => 'Data berhasil dihapus'
                ], 201);
            }
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Data tidak bisa dihapus karena telah digunakan di Detail Produk.'
        ], 400);
    }
}
