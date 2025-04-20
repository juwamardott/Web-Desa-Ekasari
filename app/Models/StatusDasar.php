<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusDasar extends Model
{
    //
    protected $fillable = [
        'status_dasar'
    ];
    public function penduduk(){
        return $this->hasMany(Penduduk::class, 'status_dasar_id');
    }
}