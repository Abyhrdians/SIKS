<?php

namespace App\Http\Controllers;

use App\Models\Transaksi_uang;
use App\Models\Transaksi_UangSekolah;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //
    public function index (Request $request)
    {

    $jenis = $request->jenis; // uang-masuk, uang-keluar, atau uang-sekolah
    $tgl_awal = $request->tgl_awal;
    $tgl_akhir = $request->tgl_akhir;

    $data = [];

    if ($jenis === 'uang-masuk') {
        $data = Transaksi_uang::with(['kategori', 'user'])
            ->where('jenis', 1)
            ->when($tgl_awal && $tgl_akhir, fn($q) =>
                $q->whereBetween('tanggal', [$tgl_awal, $tgl_akhir])
            )
            ->get();

    } elseif ($jenis === 'uang-keluar') {
        $data = Transaksi_uang::with(['kategori', 'user'])
            ->where('jenis', 0)
            ->when($tgl_awal && $tgl_akhir, fn($q) =>
                $q->whereBetween('tanggal', [$tgl_awal, $tgl_akhir])
            )
            ->get();

    } elseif ($jenis === 'uang-sekolah') {
        $data = Transaksi_UangSekolah::with(['kategori', 'user', 'siswa'])
            ->when($tgl_awal && $tgl_akhir, fn($q) =>
                $q->whereBetween('tanggal_bayar', [$tgl_awal, $tgl_akhir])
            )
            ->get();
    }
        return view('Admin.Laporan.index',compact('data','jenis'));
    }
}
