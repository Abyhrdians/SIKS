<?php

namespace App\Http\Controllers;

use App\Models\Orangtua;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Kelola_DataSiswaController extends Controller
{

    public function index(){
        $title = 'Hapus Data Siswa';
        $text = "Apakah Anda yakin ingin menghapus ini? ";
        confirmDelete($title, $text);
        $data = Siswa::with('orangtua')->get();
        return view('Admin.Kelola-Siswa.index',compact('data'));
    }
    public function cekNik(Request $request)
    {
        $ortu = Orangtua::where('nik', $request->nik)->first();

        if ($ortu) {
            return response()->json([
                'found' => true,
                'nama_ortu' => $ortu->nama_ortu,
                'nomor_telp' => $ortu->nomor_telp,
                'alamat' => $ortu->alamat,
                'pekerjaan' => $ortu->pekerjaan,
            ]);
        }
        return response()->json(['found' => false]);
    }

    public function store(Request $request)
    {
        $request->validate([
            //form siswa
            'nisn' => 'required|unique:data_siswa,nisn',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'nomor_telp' => 'required',
            'kelas' => 'required',
            //form ortu
            'nik' => 'required',
            'nama_ortu' => 'required',
            'nomor_telp_ortu' => 'required',
            'alamat_ortu' => 'required',
            'pekerjaan' => 'required',
        ]);

        try {
            $orangtua = Orangtua::updateOrCreate(
                ['nik' => $request->nik],
                [
                    'nama_ortu' => $request->nama_ortu,
                    'nomor_telp' => $request->nomor_telp_ortu,
                    'alamat' => $request->alamat_ortu,
                    'pekerjaan' => $request->pekerjaan,
                ]
            );
            Siswa::create([
                'nisn' => $request->nisn,
                'nama_siswa' => $request->nama_siswa,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'nomor_telp' => $request->nomor_telp,
                'kelas' => $request->kelas,
                'status' => 1,
                'id_orangtua' => $orangtua->id,
            ]);

            return redirect()->route('admin.kelola-siswa.index')->with('success', 'Data siswa & orang tua berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan data siswa: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function data($id){
        try {
            $data = Siswa::with('orangtua')->find($id);
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data Siswa tidak ditemukan.',
                'error' => $th->getMessage()
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // form siswa
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'nomor_telp' => 'required',
            'kelas' => 'required',
            // form ortu
            'nik' => 'required',
            'nama_ortu' => 'required',
            'nomor_telp_ortu' => 'required',
            'alamat_ortu' => 'required',
            'pekerjaan' => 'required',
        ]);

        try {
            $siswa = Siswa::findOrFail($id);

            $orangtua = Orangtua::updateOrCreate(
                ['nik' => $request->nik],
                [
                    'nama_ortu' => $request->nama_ortu,
                    'nomor_telp' => $request->nomor_telp_ortu,
                    'alamat' => $request->alamat_ortu,
                    'pekerjaan' => $request->pekerjaan,
                ]
            );

            $siswa->update([
                'nisn' => $request->nisn,
                'nama_siswa' => $request->nama_siswa,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'nomor_telp' => $request->nomor_telp,
                'kelas' => $request->kelas,
                'id_orangtua' => $orangtua->id,
            ]);

            return redirect()->route('admin.kelola-siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Gagal mengupdate data siswa: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Terjadi kesalahan saat mengupdate data.');
        }
    }

    public function destroy($id)
    {
        try {
            $siswa = Siswa::findOrFail($id);
            $siswa->delete();

            return redirect()->route('admin.kelola-siswa.index')->with('success', 'Data siswa berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus data siswa: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }


}
