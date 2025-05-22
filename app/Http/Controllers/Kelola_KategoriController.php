<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Kelola_KategoriController extends Controller
{
    public function index(){
        $title = 'Hapus Kategori';
        $text = "Apakah Anda yakin ingin menghapus ini? ";
        confirmDelete($title, $text);
        $data = Kategori::all();
        return view('Admin.Kategori.index',compact('data'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',

            'tipe' => 'required',
            'keterangan' => 'nullable',
        ]);

        try {
            Kategori::create([
                'nama_kategori' => $validate['nama'],

                'tipe' => $validate['tipe'],
                'deskripsi' => $validate['keterangan'],
            ]);
            return redirect()->route('admin.kategori.index')->with('success', 'Data kategori berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan kategori: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit($id){
        try {
             $data = Kategori::find($id);
             return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data kategori tidak ditemukan.',
                'error' => $th->getMessage()
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',

            'tipe' => 'required',
            'keterangan' => 'nullable',
        ]);

        try {
            $data = Kategori::findOrFail($id);

            $data->update([
                'nama_kategori' => $validate['nama'],
              
                'tipe' => $validate['tipe'],
                'deskripsi' => $validate['keterangan'],
            ]);

            return redirect()->back()->with('success','Data Berhasil Di Perbarui');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Gagal Memperbarui Data');
        }
    }


    public function destroy($id){
    try {
            $data = Kategori::findOrFail($id);
            $data->delete();

           return redirect()->back()->with('success','Data Berhasil Di Hapus');
        } catch (\Throwable $th) {
             return redirect()->back()->with('error','Gagal Menghapus Data');
        }
    }

}
