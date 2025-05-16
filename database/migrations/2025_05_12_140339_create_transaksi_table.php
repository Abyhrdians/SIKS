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
        Schema::create('transaksi', function (Blueprint $table) {
        $table->id();
        $table->string('kode_transaksi')->unique();
        $table->string('nama_transaksi');
        $table->date('tanggal');
        $table->integer('jenis');  // 0 = keluar, 1 = masuk
        $table->integer('jumlah');
        $table->string('keterangan')->nullable();
        $table->string('file_foto')->nullable();
        $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
        $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
