<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi_uang extends Model
{
    //
    protected $table = 'transaksi';
    protected $fillable = [
        'kode_transaksi',
        'nama_transaksi',
        'tanggal',
        'jenis',
        'jumlah',
        'keterangan',
        'file_foto',
        'kategori_id',
        'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

}
