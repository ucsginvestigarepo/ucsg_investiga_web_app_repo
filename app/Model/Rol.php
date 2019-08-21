<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'dborol';
    protected $fillable = ['id','nombre'];
}
