<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\DetailProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DetailProduk::orderBy('updated_at', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('nama_produk', function ($e) {
                    return $e['produk']['nama_produk'];
                })
                ->editColumn('jenis_produk', function ($e) {
                    return Helpers::_jenis_produk($e['produk']['jenis_produk']);
                })
                ->editColumn('tanggal_tanam', function ($e) {
                    return Helpers::_tgl_indo($e['tanggal_tanam']);
                })
                ->editColumn('tanggal_panen', function ($e) {
                    return Helpers::_tgl_indo($e['tanggal_panen']);
                })
                ->editColumn('usia', function ($e) {
                    $days = now()->diffInDays($e['tanggal_panen'], true);
                    return $days.' hari';
                })
                ->addColumn('action', function ($e) {
                    $btn = '
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-primary viewData" title="Barcode" value="'. $e['id'].'">
                            <i class="fas fa-file"></i>
                        </button>
                    </div>';
                    return $btn;
                })
                ->make(true);
        }
        $header = "Produk";
        return view('pages.public.index', compact('header'));
    }

    public function detail_produk(Request $request)
    {
        $detail = DetailProduk::join('produk', 'detail_produk.id_produk', '=', 'produk.id')
        ->where('detail_produk.id', $request->data)
        ->select(
            'detail_produk.id',
            'detail_produk.id_produk',
            'detail_produk.kode_produk',
            'detail_produk.nama_petani',
            'detail_produk.teknik_budidaya',
            'detail_produk.lokasi_tanam',
            'detail_produk.penggunaan_pupuk',
            'detail_produk.tanggal_expired',
            'detail_produk.tanggal_panen',
            'detail_produk.tanggal_tanam',
            'detail_produk.gambar_1',
            'detail_produk.gambar_2',
            'detail_produk.gambar_3',
            'produk.nama_produk',
            'produk.jenis_produk',
        )
        ->first();

        if (isset($detail)) {
            $days = now()->diffInDays($detail->tanggal_panen, true);
            $data = array(
                "status"  => "success",
                "code"    => "200",
                "data"    => [
                    'id'        => $detail->id,
                    'id_produk' => $detail->id_produk,
                    'kode_produk' => $detail->kode_produk,
                    'nama_petani' => $detail->nama_petani,
                    'teknik_budidaya' => $detail->teknik_budidaya,
                    'lokasi_tanam' => $detail->lokasi_tanam,
                    'penggunaan_pupuk' => $detail->penggunaan_pupuk,
                    'tanggal_expired' => Helpers::_tgl_indo($detail->tanggal_expired),
                    'tanggal_panen' => Helpers::_tgl_indo($detail->tanggal_panen),
                    'tanggal_tanam' => Helpers::_tgl_indo($detail->tanggal_tanam),
                    'gambar_1' => env('APP_URL')."/img/detail_produk/".$detail->gambar_1,
                    'gambar_2' => env('APP_URL')."/img/detail_produk/".$detail->gambar_2,
                    'gambar_3' => env('APP_URL')."/img/detail_produk/".$detail->gambar_3,
                    'nama_produk' => $detail->produk->nama_produk,
                    'jenis_produk' => Helpers::_jenis_produk($detail->produk->jenis_produk),
                    'usia' => $days . ' hari'
                ]
            );
            // return response($data, 200);

            $data = $data['data'];
        }

        return view('pages.public.detail', compact('data'));
    }
}
