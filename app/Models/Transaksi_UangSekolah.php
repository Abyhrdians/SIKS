<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi_UangSekolah extends Model
{
    //
    protected $table = 'transaksi_uangsekolah';
    protected $fillable = [
        'kode_traansaksi',
        'bulan',
        'tahun',
        'jumlah_bayar',
        'tanggal_bayar',
        'keterangan',
        'id_user',
        'id_kategori'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
