<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Fases extends Model
{
    protected $table = 'dbofase';
    protected $fillable = ['id','nombre','fechadesde','fechahasta','estado_id'];
}
