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
        'banjar_id',
        'pendidikan_id',
        'umur',
        'pekerjaan_id',
        'kawin_id',
        'hubungan_keluarga_id',
        'jenis_kelamin_id',
        'agama_id',
        'status_penduduk_id',
        'akta_kelahiran',
        'tempat_lahir',
        'tgl_lahir',
        'pendidikan_sedang_id',
        'pekerjaan_id', 
        'warga_negara_id',
        'negara_asal',
        'status_dasar_id',
        'anak_ke',
        'no_telepon',
        'email',
        'akta_nikah',
        'akta_perceraian',
        'tgl_perkawinan',
        'tgl_perceraian',
        'golongan_darah',
        
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

    public function jenis_kelamin(){
        return $this->belongsTo(JenisKelamin::class, 'jenis_kelamin_id');
    }


    public function status_penduduk(){
        return $this->belongsTo(StatusPenduduk::class, 'status_penduduk_id');
    }

    public function status_dasar(){
        return $this->belongsTo(StatusDasar::class, 'status_dasar_id');
    }
}