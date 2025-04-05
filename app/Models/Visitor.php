<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    //
    protected $fillable = ['date', 'count', 'ip_address', 'user_agent'];
}