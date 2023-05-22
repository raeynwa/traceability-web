<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Carbon;

class Helpers
{
    public static function _jenis_produk($id)
    {
        if ($id == 1) {
            return 'Sayur';
        } elseif ($id == 2) {
            return 'Buah';
        }
    }

    public static function _role($id)
    {
        if ($id == 1) {
            return 'Superadmin';
        }
    }

    public static function _tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        $pecahkan = explode('-', $tanggal);
        $hari = date("l", strtotime($tanggal));
        // variabel pecahkan 0 = tahun a
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tanggal

        return  $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
}