<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    //
    protected $table = 'dbocarrera';
    protected $fillable = ['id','nombre','idFacultad'];

    public static function carreras($id){
        return Carrera::where('idFacultad','=',$id)->get();
    }



}
