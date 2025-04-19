<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    /** @use HasFactory<\Database\Factories\AgamaFactory> */
    use HasFactory;
    protected $fillable = [
        'agama'
    ];

    public function penduduk(){
        return $this->hasMany(Penduduk::class, 'agama_id');
    }
}