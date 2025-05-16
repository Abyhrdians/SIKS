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
        Schema::create('data_orangtua', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik');
            $table->string('nama_ortu');
            $table->char('nomor_telp', 20);
            $table->string('alamat');
            $table->string('pekerjaan');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_orangtua');
    }
};
