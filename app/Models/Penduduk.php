<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    //
    protected $fillable = [
        'image',
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
        'tempat_lahir',
        'tgl_lahir',
        'pendidikan_sedang_ditempuh',
        'pekerjaan',  // Perhatikan ini duplikat, Anda mungkin ingin menghapusnya
        'warga_negara',
        'status_dasar'
    ];

    // public function banjar()
    // {
    //     return $this->belongsTo(Banjar::class, 'banjar_id');
    // }

    public function surat(){
        return $this->hasMany(Surat::class);
    }
}