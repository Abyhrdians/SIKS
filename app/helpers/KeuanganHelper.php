<?php

namespace App\Helpers;

use App\Models\Transaksi_uang;
use App\Models\Transaksi_UangSekolah;
use App\Models\UangSekolah;

class KeuanganHelper
{
    public static function getTotalUangMasuk()
    {
        return Transaksi_uang::where('jenis', 1)->sum('jumlah');
    }

    public static function getTotalUangKeluar()
    {
        return Transaksi_uang::where('jenis', 0)->sum('jumlah');
    }

    public static function getTotalUangSekolah()
    {
        return Transaksi_UangSekolah::sum('jumlah_bayar');
    }

    public static function getTotalKeuangan()
    {
        return self::getTotalUangMasuk() + self::getTotalUangSekolah() - self::getTotalUangKeluar();
    }
}

