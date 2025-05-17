<?php

namespace App\Http\Controllers;

use App\Helpers\KeuanganHelper;
use App\Models\Transaksi_uang;
use App\Models\Transaksi_UangSekolah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index(){
    $transaksiUmum = Transaksi_uang::with('kategori', 'user')
        ->whereIn('jenis', [0, 1])
        ->orderBy('tanggal', 'desc')
        ->limit(10)
        ->get();


    $transaksiUangSekolah = Transaksi_UangSekolah::with('user', 'siswa')
        ->orderBy('tanggal_bayar', 'desc')
        ->limit(10)
        ->get();

        $totalKeuangan = KeuanganHelper::getTotalKeuangan();
        $UangMasuk = KeuanganHelper::getTotalUangMasuk();
        $UangKeluar = KeuanganHelper::getTotalUangKeluar();
        $uangSekolah = KeuanganHelper::getTotalUangSekolah();
        return view('Admin.Dashboard',compact('totalKeuangan','UangMasuk','UangKeluar','uangSekolah','transaksiUangSekolah','transaksiUmum'));
    }
}
