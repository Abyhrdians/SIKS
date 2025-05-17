<?php

namespace App\Http\Controllers;

use App\Helpers\KeuanganHelper;
use App\Models\kategori;
use App\Models\Transaksi_UangSekolah;
use Illuminate\Http\Request;

class Transaksi_UangSekolahController extends Controller
{
    //
     public function index(){

        $title = 'Hapus Data Transaksi Uang Sekolah';
        $text = "Apakah Anda yakin ingin menghapus ini? ";
        confirmDelete($title, $text);

        $kategori = kategori::where('tipe','uang_sekolah')->get();
        $totalKeuangan = KeuanganHelper::getTotalKeuangan();
        $uangSekolah = KeuanganHelper::getTotalUangSekolah();
        $data = Transaksi_UangSekolah::with('siswa');
        return view('Admin.Transaksi.Uang-Sekolah.index',compact('data','totalKeuangan','uangSekolah'));
    }

    public function data($id){
        try {
            $data = Transaksi_UangSekolah::with('siswa')->find($id);
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan.',
                'error' => $th->getMessage()
            ], 404);
        }
    }


}
