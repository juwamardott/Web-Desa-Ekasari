<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kawin extends Model
{
    //
    protected $fillable = [
        'status'
    ];

    public function penduduk(){
        return $this->hasMany(Penduduk::class, 'kawin_id');
    }
}