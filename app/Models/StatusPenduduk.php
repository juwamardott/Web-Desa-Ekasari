<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusPenduduk extends Model
{
    //
    protected $fillable = [
        'status_penduduk'
    ];

    public function penduduk(){
        return $this->hasMany(Penduduk::class, 'status_penduduk_id');
    }
}