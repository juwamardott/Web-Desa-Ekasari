<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banjar extends Model
{
    protected $fillable = [
        'banjar', // ✅ Tambahkan field ini
        // Tambahkan field lain yang ingin diizinkan untuk mass assignment
    ];
}