<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{

    protected $table = 'data_siswa';
    protected $fillable = [
        'nisn',
        'nama_siswa',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'nomor_telp',
        'kelas',
        'status',
        'id_orangtua'
    ];
        public function orangtua()
    {
        return $this->belongsTo(Orangtua::class, 'id_orangtua');
    }

}
