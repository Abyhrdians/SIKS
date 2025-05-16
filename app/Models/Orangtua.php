<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    //
    protected $table = 'data_orangtua';
    protected $fillable = [
        'nik',
        'nama_ortu',
        'nomor_telp',
        'alamat',
        'pekerjaan'
    ];
     public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_orangtua');
    }
}
