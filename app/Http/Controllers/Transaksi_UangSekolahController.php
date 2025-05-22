<?php

namespace App\Http\Controllers;

use App\Helpers\KeuanganHelper;
use App\Models\kategori;
use App\Models\Siswa;
use App\Models\Transaksi_UangSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class Transaksi_UangSekolahController extends Controller
{
    //
     public function index(){

        $title = 'Hapus Data Transaksi Uang Sekolah';
        $text = "Apakah Anda yakin ingin menghapus ini? ";
        confirmDelete($title, $text);


        $kelas = Siswa::select('kelas')->distinct()->get();
        $kategori = kategori::where('tipe','uang_sekolah')->get();
        $siswa = Siswa::select('id','nama_siswa')->get();
        $totalKeuangan = KeuanganHelper::getTotalKeuangan();
        $uangSekolah = KeuanganHelper::getTotalUangSekolah();
        $data = Transaksi_UangSekolah::with('siswa')->get();
        return view('Admin.Transaksi.Uang-Sekolah.index',compact('kelas','data','totalKeuangan','uangSekolah','siswa','kategori'));
    }

    public function data($id){
        try {
            $data = Transaksi_UangSekolah::with('siswa.orangtua','user','kategori')->find($id);
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan.',
                'error' => $th->getMessage()
            ], 404);
        }
    }

    public function getkelas($kelas)
    {
        $siswa = Siswa::where('kelas', $kelas)->select('id', 'nama_siswa')->get();
        return response()->json($siswa);
    }

    public function store(Request $request){

        $valdiate = $request->validate([
            'nama_transaksi' => 'required',
            'jumlah_bayar' => 'required|numeric',
            'tanggal_bayar' => 'required|date',
            'keterangan' => 'nullable|string',
            'kategori' => 'required|exists:kategori,id',
            'siswa' => 'required|exists:data_siswa,id'
        ]);
        $kode_transaksi = 'TUS' . '-' . now()->format('Ymd') . '-' . Str::random(5);
        Transaksi_UangSekolah::create([
            'kode_transaksi' => $kode_transaksi,
            'nama_pembayaran' => $valdiate['nama_transaksi'],
            'jumlah_bayar' => $valdiate['jumlah_bayar'],
            'tanggal_bayar' => $valdiate['tanggal_bayar'],
            'keterangan' => $valdiate['keterangan'] ?? null,
            'id_kategori' => $valdiate['kategori'],
            'id_siswa' => $valdiate['siswa'],
            'id_user' => Auth::id(),
        ]);

        return redirect()->route('admin.uangsekolah.index')->with('success', 'Transaksi berhasil disimpan!');
    }

    public function update(Request $request,$id){
        $validated = $request->validate([
            'nama_transaksi' => 'required',
            'jumlah_bayar' => 'required|numeric',
            'tanggal_bayar' => 'required|date',
            'keterangan' => 'nullable|string',
            'kategori' => 'required|exists:kategori,id',
            'siswa' => 'required|exists:data_siswa,id'
        ]);
        $transaksi = Transaksi_UangSekolah::findOrFail($id);

        $transaksi->update([
            'nama_pembayaran' => $validated['nama_transaksi'],
            'jumlah_bayar' => $validated['jumlah_bayar'],
            'tanggal_bayar' => $validated['tanggal_bayar'],
            'keterangan' => $validated['keterangan'] ?? null,
            'id_kategori' => $validated['kategori'],
            'id_siswa' => $validated['siswa'],
            'id_user' => Auth::id(),
        ]);
        return redirect()->route('admin.uangsekolah.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi_UangSekolah::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('admin.uangsekolah.index')->with('success', 'Transaksi berhasil dihapus!');
    }


}
