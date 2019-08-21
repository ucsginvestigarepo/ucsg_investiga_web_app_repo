<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'dbopropuesta';
    protected $fillable = ['id','nombrepropuesta','palabraclave','descripciontema','problema','solucionproblema','rutaarchivo','idUsuario','idEstado','aceptatermino','idFase','idDominio'];
}
