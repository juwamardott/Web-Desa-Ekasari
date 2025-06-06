<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banjar extends Model
{
    protected $fillable = [
        'banjar',
    ];

    public function penduduk(){
        return $this->hasMany(Penduduk::class, 'banjar_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'banjar_id');
    }
}