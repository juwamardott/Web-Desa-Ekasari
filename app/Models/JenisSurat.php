<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    //
    protected $fillable = [
        'jenis_surat',
        'keterangan'
    ];

    public function surat(){
        return $this->hasMany(Surat::class);
    }
}