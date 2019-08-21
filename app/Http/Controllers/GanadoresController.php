<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\Dominio;
class GanadoresController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){

        if (auth()->user()->idRol==6) {
            return view('error.index');
        }
        /*
        $sql="SELECT * FROM (
            SELECT TABLA.ano,us.name nombre,dom.nombre dominio,TABLA.idPropuesta,pro.nombrepropuesta,AVG(TABLA.nota) nota FROM (
                        SELECT year(created_at) ano,idPropuesta,idUsuario,sum(nota) nota FROM dbodetallecalificacion
                        GROUP BY year(created_at),idPropuesta,idUsuario
                        ) AS TABLA
                                    left join dbopropuesta pro on pro.id=TABLA.idPropuesta
                                    left join dbodominio dom on dom.id=pro.idDominio
                                    left join dbousuario us on us.id=pro.idUsuario
                                    where TABLA.ano=year(curdate())
                                    GROUP BY TABLA.ano,us.name,dom.nombre,TABLA.idPropuesta,pro.nombrepropuesta
            ) AS TABLA2 ORDER BY TABLA2.ANO,TABLA2.nota DESC limit 3"; 
                */


        $dominios=Dominio::select('dbodominio.id')
        ->get();
        $sql="SELECT * FROM (";

        $cantidadDominio=count($dominios);
        //return $cantidadDominio;
        $cont=1;
        foreach ($dominios as $key) {

            if ($cont<$cantidadDominio) {
                $sql=$sql." (SELECT @curRow".$cont." := @curRow".$cont." + 1 AS row_number,TABLA2.ano,TABLA2.nombre,TABLA2.dominio,TABLA2.nombrepropuesta,TABLA2.nota FROM(
                    SELECT TABLA.ano,us.name nombre,dom.id idDominio,dom.nombre dominio,TABLA.idPropuesta,pro.nombrepropuesta,AVG(TABLA.nota) nota FROM (
                                SELECT year(created_at) ano,idPropuesta,idUsuario,sum(nota) nota FROM dbodetallecalificacion
                                GROUP BY year(created_at),idPropuesta,idUsuario
                                ) AS TABLA
                                            left join dbopropuesta pro on pro.id=TABLA.idPropuesta
                                            left join dbodominio dom on dom.id=pro.idDominio
                                            left join dbousuario us on us.id=pro.idUsuario
                                            where TABLA.ano=year(curdate())
                                            GROUP BY TABLA.ano,us.name,dom.nombre,TABLA.idPropuesta,pro.nombrepropuesta
                    ) AS TABLA2
                    JOIN    (SELECT @curRow".$cont." := 0) r
                    WHERE TABLA2.idDominio=".$key["id"]." AND TABLA2.ANO=YEAR(CURDATE()) ORDER BY TABLA2.dominio,TABLA2.nota DESC LIMIT 2 ) UNION ALL";
            } else {
                $sql=$sql." (SELECT @curRow".$cont." := @curRow".$cont." + 1 AS row_number,TABLA2.ano,TABLA2.nombre,TABLA2.dominio,TABLA2.nombrepropuesta,TABLA2.nota FROM(
                    SELECT TABLA.ano,us.name nombre,dom.id idDominio,dom.nombre dominio,TABLA.idPropuesta,pro.nombrepropuesta,AVG(TABLA.nota) nota FROM (
                                SELECT year(created_at) ano,idPropuesta,idUsuario,sum(nota) nota FROM dbodetallecalificacion
                                GROUP BY year(created_at),idPropuesta,idUsuario
                                ) AS TABLA
                                            left join dbopropuesta pro on pro.id=TABLA.idPropuesta
                                            left join dbodominio dom on dom.id=pro.idDominio
                                            left join dbousuario us on us.id=pro.idUsuario
                                            where TABLA.ano=year(curdate())
                                            GROUP BY TABLA.ano,us.name,dom.nombre,TABLA.idPropuesta,pro.nombrepropuesta
                    ) AS TABLA2
                    JOIN    (SELECT @curRow".$cont." := 0) r
                    WHERE TABLA2.idDominio=".$key["id"]." AND TABLA2.ANO=YEAR(CURDATE()) ORDER BY TABLA2.dominio,TABLA2.nota DESC LIMIT 2 )";
            }
            $cont=$cont+1;

           
        }
        $sql=$sql." ) AS TABLA3 ORDER BY TABLA3.dominio,TABLA3.nota desc";
        //return  $sql;
        $sql2="SELECT MAX(fechadesde) desde,MAX(fechahasta) hasta FROM dbofase WHERE YEAR(created_at)=year(curdate()) ";
        $datos=DB::select($sql);
        $final=DB::select($sql2);
        //return $final;
        return view('ganadores.index',compact('datos','final'));
    }
}
