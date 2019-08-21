<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    //
    protected $table = 'dbofacultad';
    protected $fillable = ['id','nombre'];
}