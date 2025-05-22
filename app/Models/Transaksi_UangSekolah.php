<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi_UangSekolah extends Model
{
    //
    protected $table = 'transaksi_uangsekolah';
    protected $fillable = [
        'kode_transaksi',
        'nama_pembayaran',
        'jumlah_bayar',
        'tanggal_bayar',
        'keterangan',
        'id_user',
        'id_kategori',
        'id_siswa'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}
