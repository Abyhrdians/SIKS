<?php

namespace App\Http\Controllers;

use App\Helpers\KeuanganHelper;
use App\Models\kategori;
use App\Models\Transaksi_uang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Transaksi_UangMasukController extends Controller
{
    //
    public function index(){
        $title = 'Hapus Data Transaksi Uang Masuk';
        $text = "Apakah Anda yakin ingin menghapus ini? ";
        confirmDelete($title, $text);

        $kategori = kategori::where('tipe','uang_masuk')->get();
        $totalKeuangan = KeuanganHelper::getTotalKeuangan();
        $UangMasuk = KeuanganHelper::getTotalUangMasuk();
        $UangKeluar = KeuanganHelper::getTotalUangKeluar();
        $data = Transaksi_uang::with('kategori','user')->where('jenis',1)->get();
        return view('Admin.Transaksi.Uang-Masuk.index',compact('kategori','totalKeuangan','data','UangMasuk','UangKeluar'));
    }

    public function store (Request $request){
        $validated = $request->validate([
            'jumlah'        => 'required|numeric|min:0',
            'tanggal'       => 'required|date',
            'nama'         => 'required',
            'kategori'   => 'required|exists:kategori,id',
            'Keterangan'    => 'nullable|string',
            // 'file_foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $kode_transaksi = 'TUM' . '-' . now()->format('Ymd') . '-' . Str::random(5);

        Transaksi_uang::create([
            'kode_transaksi' => $kode_transaksi,
            'nama_transaksi' => $validated['nama'],
            'tanggal'        => $validated['tanggal'],
            'jenis'          => 1,
            'jumlah'         => $validated['jumlah'],
            'keterangan'     => $validated['Keterangan'] ?? null,
            'kategori_id'    => $validated['kategori'],
            'id_user'        => Auth::id(),
        ]);
        return redirect()->route('admin.uangmasuk.index')->with('success', 'Transaksi berhasil disimpan!');
    }

    public function data($id){
        try {
            $data = Transaksi_uang::with('kategori')->find($id);
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data Transaksi tidak ditemukan.',
                'error' => $th->getMessage()
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jumlah'      => 'required|numeric|min:0',
            'tanggal'     => 'required|date',
            'nama'        => 'required',
            'kategori'    => 'required|exists:kategori,id',
            'Keterangan'  => 'nullable|string',
        ]);

        $transaksi = Transaksi_uang::findOrFail($id);

        if ($transaksi->jenis != 1) {
            abort(403, 'Tidak diizinkan mengubah jenis transaksi ini.');
        }

        $transaksi->update([
            'nama_transaksi' => $validated['nama'],
            'tanggal'        => $validated['tanggal'],
            'jumlah'         => $validated['jumlah'],
            'keterangan'     => $validated['Keterangan'] ?? null,
            'kategori_id'    => $validated['kategori'],
            'id_user'        => Auth::id(),
        ]);

        return redirect()->route('admin.uangmasuk.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi_uang::findOrFail($id);
        if ($transaksi->jenis != 1) {
            abort(403, 'Tidak diizinkan menghapus jenis transaksi ini.');
        }
        $transaksi->delete();
        return redirect()->route('admin.uangmasuk.index')->with('success', 'Transaksi berhasil dihapus!');
    }


}
