<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DetalleRevisado extends Model
{
    protected $table = 'dbodetallerevision';
    protected $fillable = ['id','idTema','idPropuesta','idUsuario','revisado'];
}
