<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
    protected $table = 'dboestado';
    protected $fillable = ['id','nombre'];
}
