<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi_uangsekolah', function (Blueprint $table) {
        $table->id();
        $table->string('kode_transaksi')->unique();
        $table->string('nama_pembayaran');
        $table->integer('jumlah_bayar');
        $table->date('tanggal_bayar');
        $table->string('keterangan')->nullable();
        $table->foreignId('id_siswa')->constrained('data_siswa')->onDelete('cascade');
        $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
        $table->foreignId('id_kategori')->constrained('kategori')->onDelete('cascade');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_uangsekolah');
    }
};
