<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    //
    protected $fillable = [
        'no_kk',
        'nik',
        'nama',
        'nama_ayah',
        'nama_ibu',
        'nik_ayah',
        'nik_ibu',
        'alamat',
        'banjar',
        'pendidikan',
        'umur',
        'pekerjaan',
        'kawin',
        'hubungan_keluarga',
        'jenis_kelamin',
        'agama',
        'status_penduduk',
        'akta_kelahiran',
        'ttl',
        'pendidikan_sedang_ditempuh',
        'pekerjaan',  // Perhatikan ini duplikat, Anda mungkin ingin menghapusnya
        'warga_negara'
    ];

    // public function banjar()
    // {
    //     return $this->belongsTo(Banjar::class, 'banjar_id');
    // }
}