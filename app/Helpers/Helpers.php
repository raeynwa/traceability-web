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
}