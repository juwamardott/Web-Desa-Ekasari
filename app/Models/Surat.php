<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    //
    protected $fillable = [
        'nomor_surat',
        'jenis_surat_id',
        'penduduk_id',
        'keperluan',
        'tanggal_dibuat'
    ];
    public function jenisSurat(){
        return $this->belongsTo(JenisSurat::class);
    }

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}