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
            ['nama_kategori' => 'Donasi Siswa', 'tipe' => 'uang_masuk', 'keterangan' => 'Donasi dari siswa untuk kegiatan sosial'],
            ['nama_kategori' => 'Sumbangan Pembangunan', 'tipe' => 'uang_masuk', 'keterangan' => 'Dana sumbangan pembangunan fasilitas'],
            ['nama_kategori' => 'Uang Pendaftaran', 'tipe' => 'uang_masuk', 'keterangan' => 'Biaya pendaftaran siswa baru'],
            ['nama_kategori' => 'Dana BOS', 'tipe' => 'uang_masuk', 'keterangan' => 'Dana BOS dari pemerintah'],
            ['nama_kategori' => 'Pemasukan Lainnya', 'tipe' => 'uang_masuk', 'keterangan' => 'Pemasukan dari pihak luar'],

            // uang_keluar
            ['nama_kategori' => 'Pembelian Alat Tulis', 'tipe' => 'uang_keluar', 'keterangan' => 'Pengeluaran untuk alat tulis kantor'],
            ['nama_kategori' => 'Gaji Guru Honorer', 'tipe' => 'uang_keluar', 'keterangan' => 'Pembayaran gaji guru honorer'],
            ['nama_kategori' => 'Perawatan Gedung', 'tipe' => 'uang_keluar', 'keterangan' => 'Biaya perawatan dan perbaikan gedung'],
            ['nama_kategori' => 'Kegiatan Ekstrakurikuler', 'tipe' => 'uang_keluar', 'keterangan' => 'Dana kegiatan ekstrakurikuler siswa'],
            ['nama_kategori' => 'Transportasi', 'tipe' => 'uang_keluar', 'keterangan' => 'Biaya transportasi untuk acara sekolah'],

            // uang_sekolah
            ['nama_kategori' => 'SPP Bulanan', 'tipe' => 'uang_sekolah', 'keterangan' => 'Pembayaran uang sekolah bulanan'],
            ['nama_kategori' => 'Uang Seragam', 'tipe' => 'uang_sekolah', 'keterangan' => 'Pembayaran seragam sekolah'],
            ['nama_kategori' => 'Uang Buku', 'tipe' => 'uang_sekolah', 'keterangan' => 'Pembayaran buku pelajaran'],
            ['nama_kategori' => 'Uang Kegiatan', 'tipe' => 'uang_sekolah', 'keterangan' => 'Pembayaran kegiatan sekolah tahunan'],
            ['nama_kategori' => 'Uang Ujian', 'tipe' => 'uang_sekolah', 'keterangan' => 'Pembayaran ujian semester/genap'],
        ];

        DB::table('kategori')->insert($data);
    }
}
