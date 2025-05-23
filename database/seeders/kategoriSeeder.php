<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            // uang_masuk
            ['nama_kategori' => 'Donasi Siswa', 'tipe' => 'uang_masuk', 'deskripsi' => 'Donasi dari siswa untuk kegiatan sosial'],
            ['nama_kategori' => 'Sumbangan Pembangunan', 'tipe' => 'uang_masuk', 'deskripsi' => 'Dana sumbangan pembangunan fasilitas'],
            ['nama_kategori' => 'Uang Pendaftaran', 'tipe' => 'uang_masuk', 'deskripsi' => 'Biaya pendaftaran siswa baru'],
            ['nama_kategori' => 'Dana BOS', 'tipe' => 'uang_masuk', 'deskripsi' => 'Dana BOS dari pemerintah'],
            ['nama_kategori' => 'Pemasukan Lainnya', 'tipe' => 'uang_masuk', 'deskripsi' => 'Pemasukan dari pihak luar'],

            // uang_keluar
            ['nama_kategori' => 'Pembelian Alat Tulis', 'tipe' => 'uang_keluar', 'deskripsi' => 'Pengeluaran untuk alat tulis kantor'],
            ['nama_kategori' => 'Gaji Guru Honorer', 'tipe' => 'uang_keluar', 'deskripsi' => 'Pembayaran gaji guru honorer'],
            ['nama_kategori' => 'Perawatan Gedung', 'tipe' => 'uang_keluar', 'deskripsi' => 'Biaya perawatan dan perbaikan gedung'],
            ['nama_kategori' => 'Kegiatan Ekstrakurikuler', 'tipe' => 'uang_keluar', 'deskripsi' => 'Dana kegiatan ekstrakurikuler siswa'],
            ['nama_kategori' => 'Transportasi', 'tipe' => 'uang_keluar', 'deskripsi' => 'Biaya transportasi untuk acara sekolah'],

            // uang_sekolah
            ['nama_kategori' => 'SPP Bulanan', 'tipe' => 'uang_sekolah', 'deskripsi' => 'Pembayaran uang sekolah bulanan'],
            ['nama_kategori' => 'Uang Seragam', 'tipe' => 'uang_sekolah', 'deskripsi' => 'Pembayaran seragam sekolah'],
            ['nama_kategori' => 'Uang Buku', 'tipe' => 'uang_sekolah', 'deskripsi' => 'Pembayaran buku pelajaran'],
            ['nama_kategori' => 'Uang Kegiatan', 'tipe' => 'uang_sekolah', 'deskripsi' => 'Pembayaran kegiatan sekolah tahunan'],
            ['nama_kategori' => 'Uang Ujian', 'tipe' => 'uang_sekolah', 'deskripsi' => 'Pembayaran ujian semester/genap'],
        ];

        DB::table('kategori')->insert($data);
    }
}
