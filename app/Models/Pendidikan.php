<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    /** @use HasFactory<\Database\Factories\PendidikanFactory> */
    use HasFactory;
    protected $fillable = [
        'pendidikan'
    ];

    public function penduduk(){
        return $this->hasMany(Penduduk::class, 'pendidikan_id');
    }
}