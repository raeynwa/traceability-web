<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Produk;
use App\Helpers\Helpers;
use App\Models\DetailProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DetailProdukController extends Controller
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
                    return $days . ' hari';
                })
                ->addColumn('action', function ($e) {
                    $btn = '
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-primary btnBarcode" title="Barcode" value="' . $e['id'] . '">
                            <i class="fas fa-qrcode"></i>
                        </button>
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
        // return $request;
        $produk = Produk::where('id', $request->id_produk)->first();
        $dates  = Carbon::now();
        $no = 1;

        if ($produk->jenis_produk == 1) {
            $kd_1 = 'VGT';
        } else {
            $kd_1 = 'FRT';
        }

        $a = 1;
        while ($a == 1) {
            $kode = $kd_1 . '-' . $dates->format('Ymd') . sprintf('%03d', $no);
            $kodeDetailProduk = DetailProduk::where('kode_produk', $kode)->count();
            if ($kodeDetailProduk <= 0) {
                $a = 2;
            }
            $no++;
        }

        if ($request->hasFile('gambar_1')) {
            $file_1   = $request->file('gambar_1');
            $ext_1    = $file_1->getClientOriginalExtension();
            if ($ext_1 == 'jpg' || $ext_1 == 'jpeg' || $ext_1 == 'png'  || $ext_1 == 'JPG' || $ext_1 == 'HEIC') {
                $name_file_1  = 'Produk_1_' . $kode . '_' . $dates->format('Y-m-d-H-i-s') . '.' . $ext_1;
                $request->file('gambar_1')->move("img/detail_produk", $name_file_1);
            }
        }

        if ($request->hasFile('gambar_2')) {
            $file_2   = $request->file('gambar_2');
            $ext_2    = $file_2->getClientOriginalExtension();
            if ($ext_2 == 'jpg' || $ext_2 == 'jpeg' || $ext_2 == 'png'  || $ext_2 == 'JPG' || $ext_2 == 'HEIC') {
                $name_file_2  = 'Produk_2_' . $kode . '_' . $dates->format('Y-m-d-H-i-s') . '.' . $ext_2;
                $request->file('gambar_2')->move("img/detail_produk", $name_file_2);
            }
        }

        if ($request->hasFile('gambar_3')) {
            $file_3   = $request->file('gambar_3');
            $ext_3    = $file_3->getClientOriginalExtension();
            if ($ext_3 == 'jpg' || $ext_3 == 'jpeg' || $ext_3 == 'png'  || $ext_3 == 'JPG' || $ext_3 == 'HEIC') {
                $name_file_3  = 'Produk_3_' . $kode . '_' . $dates->format('Y-m-d-H-i-s') . '.' . $ext_3;
                $request->file('gambar_3')->move("img/detail_produk", $name_file_3);
            }
        }

        // return $request->data_id;

        if ($request->data_id == '' || $request->data_id == NULL) {
            $create = DetailProduk::create([
                'id_produk'         => $request->id_produk,
                'kode_produk'       => $kode,
                'nama_petani'       => $request->nama_petani,
                'teknik_budidaya'   => $request->teknik_budidaya,
                'lokasi_tanam'      => $request->lokasi_tanam,
                'tanggal_tanam'     => $request->tgl_tanam,
                'tanggal_panen'     => $request->tgl_panen,
                'tanggal_expired'   => $request->tgl_exp,
                'penggunaan_pupuk'  => $request->penggunaan_pupuk,
                'gambar_1'          => $name_file_1 ?? '',
                'gambar_2'          => $name_file_2 ?? '',
                'gambar_3'          => $name_file_3 ?? '',
            ]);

            if ($create) {
                return response()->json([
                    'title'     => 'Berhasil',
                    'status'    => 'success',
                    'message'   => 'Data Berhasil disimpan'
                ], 201);
            }
        } else {
            $data = DetailProduk::where('id', $request->data_id)->first();
            $data->id_produk        = $request->id_produk;
            $data->nama_petani      = $request->nama_petani;
            $data->teknik_budidaya  = $request->teknik_budidaya;
            $data->lokasi_tanam     = $request->lokasi_tanam;
            $data->tanggal_tanam    = $request->tgl_tanam;
            $data->tanggal_panen    = $request->tgl_panen;
            $data->tanggal_expired  = $request->tgl_exp;
            $data->penggunaan_pupuk = $request->penggunaan_pupuk;
            $data->gambar_1         = $name_file_1 ?? $data->gambar_1;
            $data->gambar_2         = $name_file_2 ?? $data->gambar_2;
            $data->gambar_3         = $name_file_3 ?? $data->gambar_3;
            $data->updated_at       = Carbon::now();

            if ($data->save()) {
                return response()->json([
                    'title'     => 'Berhasil',
                    'status'    => 'success',
                    'message'   => 'Data Berhasil diupdate'
                ], 201);
            }
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Something Wrong.'
        ], 400);
    }

    public function edit(Request $request)
    {
        if ($request->id != '') {
            $data = DetailProduk::join('produk', 'detail_produk.id_produk', '=', 'produk.id')
                ->where('detail_produk.id', $request->id)
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

            if (isset($data)) {
                $returnData = array(
                    "status"  => "success",
                    "code"    => "200",
                    "data"    => [
                        'id'                => $data->id,
                        'id_produk'         => $data->id_produk,
                        'kode_produk'       => $data->kode_produk,
                        'nama_petani'       => $data->nama_petani,
                        'teknik_budidaya'   => $data->teknik_budidaya,
                        'lokasi_tanam'      => $data->lokasi_tanam,
                        'penggunaan_pupuk'  => $data->penggunaan_pupuk,
                        'tanggal_expired'   => $data->tanggal_expired,
                        'tanggal_panen'     => $data->tanggal_panen,
                        'tanggal_tanam'     => $data->tanggal_tanam,
                        'gambar_1'          => env('APP_URL') . "/img/detail_produk/" . $data->gambar_1,
                        'gambar_2'          => env('APP_URL') . "/img/detail_produk/" . $data->gambar_2,
                        'gambar_3'          => env('APP_URL') . "/img/detail_produk/" . $data->gambar_3,
                        'nama_produk'       => $data->produk->nama_produk,
                        'jenis_produk'      => $data->produk->jenis_produk
                    ]
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
        $data = DetailProduk::where('id', $request->id)->first();

        if ($data->delete()) {
            return response()->json([
                'status'    => 'success',
                'message'   => 'Data berhasil dihapus'
            ], 201);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Data tidak bisa dihapus karena telah digunakan di Detail Produk.'
        ], 400);
    }

    public function detail(Request $request)
    {
        // return $request;
        $data = DetailProduk::where('id', $request->id)->select('kode_produk', 'id')->first();
        $qrCode = QrCode::size(150)->generate(env('APP_URL') . '/public/detail-produk?data=' . $data->id);
        $view = view('pages.detail_produk.detail', compact('data', 'qrCode'));
        // dd($data['header']);
        $options = new \Dompdf\Options();
        $options->setIsRemoteEnabled(true);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);
        $dompdf->setOptions($options);
        $dompdf->setPaper('a6', 'portait');
        $dompdf->set_option('isRemoteEnabled', true);
        $dompdf->render();
        $dompdf->stream('qrcode.pdf', array("Attachment" => false));
        exit();
    }
}
