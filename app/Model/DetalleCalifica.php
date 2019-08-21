<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DetalleCalifica extends Model
{
    protected $table = 'dbodetallecalificacion';
    protected $fillable = ['id','idTema','idPropuesta','idUsuario','nota'];
}
