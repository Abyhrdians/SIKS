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
        Schema::create('data_siswa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nisn');
            $table->string('nama_siswa');
            $table->char('jenis_kelamin',2);
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->char('nomor_telp',20);
            $table->string('kelas', 50);
            $table->integer('status');
            $table->foreignId('id_orangtua')->constrained('data_orangtua')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_siswa');
    }
};
