<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class RankingController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){

        if (auth()->user()->idRol==6) {
            return view('error.index');
        }
        
        $sql="SELECT * FROM (
            SELECT TABLA.ano,us.name nombre,dom.nombre dominio,TABLA.idPropuesta,pro.nombrepropuesta,AVG(TABLA.nota) nota FROM (
                        SELECT year(created_at) ano,idPropuesta,idUsuario,sum(nota) nota FROM dbodetallecalificacion
                        GROUP BY year(created_at),idPropuesta,idUsuario
                        ) AS TABLA
                                    INNER join dbopropuesta pro on pro.id=TABLA.idPropuesta AND year(pro.created_at)=YEAR(CURDATE())
                                    left join dbodominio dom on dom.id=pro.idDominio
                                    left join dbousuario us on us.id=pro.idUsuario
                                    where TABLA.ano=year(curdate())
                                    GROUP BY TABLA.ano,us.name,dom.nombre,TABLA.idPropuesta,pro.nombrepropuesta
            ) AS TABLA2 ORDER BY TABLA2.nota DESC"; 
 
       
       $datos=DB::select($sql);
        return view('rankings.index',compact('datos'));
    }
}
