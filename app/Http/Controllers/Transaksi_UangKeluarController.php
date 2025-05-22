<?php

namespace App\Http\Controllers;

use App\Helpers\KeuanganHelper;
use App\Models\kategori;
use App\Models\Transaksi_uang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class Transaksi_UangKeluarController extends Controller
{
    //
    public function index(){
        $title = 'Hapus Data Transaksi Uang Keluar';
        $text = "Apakah Anda yakin ingin menghapus ini? ";
        confirmDelete($title, $text);

        $kategori = kategori::where('tipe','uang_keluar')->get();
        $totalKeuangan = KeuanganHelper::getTotalKeuangan();
        $UangMasuk = KeuanganHelper::getTotalUangMasuk();
        $UangKeluar = KeuanganHelper::getTotalUangKeluar();
        $data = Transaksi_uang::with('kategori','user')->where('jenis',0)->get();
        return view('Admin.Transaksi.Uang-Keluar.index',compact('kategori','totalKeuangan','UangMasuk','UangKeluar','data'));
    }

    public function store (Request $request){
        $validated = $request->validate([
            'jumlah'        => 'required|numeric|min:0',
            'tanggal'       => 'required|date',
            'nama'         => 'required',
            'kategori'   => 'required|exists:kategori,id',
            'Keterangan'    => 'nullable|string',
            'file'     => 'required|image|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);
        $totalKeuangan = KeuanganHelper::getTotalKeuangan();

        if ($validated['jumlah'] > $totalKeuangan) {
            return back()->withInput()->with('error', 'Transaksi gagal: saldo tidak mencukupi.');
        }
        if ($request->hasFile('file')) {
            $pathFile = $request->file('file')->store('uang-keluar/file', 'public');
        }
        $kode_transaksi = 'TUK' . '-' . now()->format('Ymd') . '-' . Str::random(5);

        Transaksi_uang::create([
            'kode_transaksi' => $kode_transaksi,
            'nama_transaksi' => $validated['nama'],
            'tanggal'        => $validated['tanggal'],
            'jenis'          => 0,
            'jumlah'         => $validated['jumlah'],
            'keterangan'     => $validated['Keterangan'] ?? null,
            'kategori_id'    => $validated['kategori'],
            'file_foto'      => $pathFile,
            'id_user'        => Auth::id(),
        ]);
        return redirect()->route('admin.uangkeluar.index')->with('success', 'Transaksi berhasil disimpan!');
    }

    public function data($id){
        try {
            $data = Transaksi_uang::with('kategori','user')->find($id);
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
        if ($transaksi->jenis != 0) {
            abort(403, 'Tidak diizinkan mengubah transaksi ini.');
        }

        $totalKeuangan = KeuanganHelper::getTotalKeuangan();
        if ($validated['jumlah'] > $totalKeuangan) {
            return back()->withInput()->with('error', 'Transaksi gagal: saldo tidak mencukupi.');
        }

        if ($request->hasFile('file')) {
            if ($transaksi->file_foto && Storage::disk('public')->exists($transaksi->file_foto)) {
                Storage::disk('public')->delete($transaksi->file_foto);
            }
            $transaksi->file_foto = $request->file('file_foto')->store('uang-keluar/file', 'public');
        }

        $transaksi->update([
            'nama_transaksi' => $validated['nama'],
            'tanggal'        => $validated['tanggal'],
            'jumlah'         => $validated['jumlah'],
            'keterangan'     => $validated['Keterangan'] ?? null,
            'kategori_id'    => $validated['kategori'],
            'file_foto'      => $transaksi->file_foto,
            'id_user'        => Auth::id(),
        ]);

        return redirect()->route('admin.uangkeluar.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi_uang::findOrFail($id);
        if ($transaksi->jenis != 0) {
            abort(403, 'Tidak diizinkan menghapus transaksi ini.');
        }
        $transaksi->delete();
        return redirect()->route('admin.uangkeluar.index')->with('success', 'Transaksi berhasil dihapus!');
    }

}
