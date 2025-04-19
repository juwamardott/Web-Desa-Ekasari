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

    public function banjar()
    {
        return $this->belongsTo(Banjar::class, 'banjar_id');
    }

    public function pendidikan(){
        return $this->belongsTo(Pendidikan::class, 'pendidikan_id');
    }

    public function pendidikan_sedang(){
        return $this->belongsTo(Pendidikan::class, 'pendidikan_sedang_id');
    }

    public function pekerjaan(){
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id');
    }

    public function agama(){
        return $this->belongsTo(Agama::class, 'agama_id');
    }

    public function surat(){
        return $this->hasMany(Surat::class);
    }

    public function hubungan_keluarga(){
        return $this->belongsTo(HubunganKeluarga::class, 'hubungan_keluarga_id');
    }
}