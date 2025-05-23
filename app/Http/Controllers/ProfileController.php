<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class ProfileController extends Controller
{
    // Menampilkan form edit profile
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // Memproses update profile
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'current_password' => 'nullable|string|min:8',
            'new_password' => 'nullable|string|min:8|confirmed',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Nama lengkap wajib diisi',
            'email.required' => 'Alamat email wajib diisi',
            'email.unique' => 'Email ini sudah digunakan',
            'new_password.min' => 'Password minimal 8 karakter',
            'new_password.confirmed' => 'Konfirmasi password tidak cocok',
            'profile_image.image' => 'File harus berupa gambar',
            'profile_image.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        // Cek validasi
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Verifikasi password saat ini jika ingin ganti password
        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()
                    ->with('error', 'Password saat ini salah')
                    ->withInput();
            }
        }

        // Proses update data
        try {
            $user->name = $request->name;
            $user->email = $request->email;

            // Update password jika diisi
            if ($request->filled('new_password')) {
                $user->password = Hash::make($request->new_password);
            }

            // Handle upload gambar profil
            if ($request->hasFile('profile_image')) {
                // Hapus foto lama jika ada
                if ($user->foto) {
                    Storage::disk('public')->delete($user->foto);
                }
                $file = $request->file('profile_image');
                $ext = $file->getClientOriginalExtension();
                $namaFile = 'foto_' . uniqid() . '.' . $ext;
                $path = $file->storeAs('foto_profile', $namaFile, 'public');
                $user->foto = $path;
            }

            $user->save();

            return redirect()->route('profile')
                ->with('success', 'Profil berhasil diperbarui');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: '.$e->getMessage())
                ->withInput();
        }
    }

    // Menghapus foto profil
    public function deleteProfileImage()
    {
        $user = Auth::user();
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
            $user->foto = null;
            $user->save();
        }

        return response()->json(['success' => true]);
    }
}
