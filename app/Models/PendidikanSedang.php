<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanSedang extends Model
{
    /** @use HasFactory<\Database\Factories\PendidikanSedangFactory> */
    use HasFactory;
    protected $fillable = [
        'pendidikan_sedang'
    ];

    public function penduduk(){
        return $this->hasMany(Penduduk::class, 'pekerjaan_sedang_id');
    }
}