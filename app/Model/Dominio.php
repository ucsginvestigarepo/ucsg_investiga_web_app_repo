<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Dominio extends Model
{
    protected $table = 'dbodominio';
    protected $fillable = ['id','nombre'];
}
