<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    //
    protected $fillable = [
        'jenis_kelamin',
    ];

    public function penduduk(){
        return $this->hasMany(Penduduk::class,'jenis_kelamin_id');
    }
}