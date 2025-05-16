<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Kelola_PenggunaController extends Controller
{
    //
     public function index(){
        $title = 'Hapus Pengguna';
        $text = "Apakah Anda yakin ingin menghapus ini? ";
        confirmDelete($title, $text);
        $data = User::all();
        return view('Admin.Kelola_pengguna.index',compact('data'));
    }

   public function store(Request $request)
{
    $validate = $request->validate([
        'nama' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'role' => 'required',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // maksimal 2MB
    ]);

    try {
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $namaFile = 'foto_' . uniqid() . '.' . $ext;
            $path = $file->storeAs('foto_profile', $namaFile, 'public');
        }

        User::create([
            'name' => $validate['nama'],
            'email' => $validate['email'],
            'role' => $validate['role'],
            'password' => bcrypt($validate['password']),
            'foto' => $path,
        ]);



        return redirect()->route('admin.kelola-pengguna.index')->with('success', 'Data pengguna berhasil disimpan.');
    } catch (\Exception $e) {
        Log::error('Gagal menyimpan pengguna: ' . $e->getMessage());
        return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
    }
}


    public function edit($id){
        try {
             $data = User::find($id);
             return response()->json($data);
        } catch (\Throwable $th) {
             Log::error('Gagal menyimpan pengguna: ' . $th->getMessage());
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
        'email' => 'required|email',
        'password' => 'nullable',
        'role' => 'required',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // maksimal 2MB
    ]);

    try {
        $data = User::findOrFail($id);
        $data->name = $validate['nama'];
        $data->email =$validate['email'];
        $data->role =$validate['role'];
        if($request->password){
            $data->password =$validate['password'];
        }
        if ($request->hasFile('foto')) {
            if ($data->foto && Storage::disk('public')->exists($data->foto)) {
                Storage::disk('public')->delete($data->foto);
            }
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $filename = 'foto_' . uniqid() . '.' . $ext;
            $path = $file->storeAs('foto_profile', $filename, 'public');
            $data->foto = $path;
        }
        $data->save();
         return redirect()->back()->with('success','Data Berhasil Di Perbarui');
    } catch (\Throwable $th) {
        Log::error('Gagal menyimpan pengguna: ' . $th->getMessage());
        return redirect()->back()->with('error','Gagal Memperbarui Data');
    }
}


    public function destroy($id){
        try {
            $data = User::findOrFail($id);
            if (!$data) {
                return redirect()->back()->with('error', 'Data tidak ditemukan');
            }
            if ($data->foto && Storage::disk('public')->exists($data->foto)) {
                Storage::disk('public')->delete($data->foto);
            }
            $data->delete();
            return redirect()->back()->with('success','Data Berhasil Di Hapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Gagal Menghapus Data');
        }
    }
}
