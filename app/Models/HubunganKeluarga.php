<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HubunganKeluarga extends Model
{
    /** @use HasFactory<\Database\Factories\HubunganKeluargaFactory> */
    use HasFactory;
    protected $fillable = [
        'hubungan_keluarga'
    ];

    public function penduduk(){
        return $this->hasMany(Penduduk::class, 'hubungan_keluarga_id');
    }
}