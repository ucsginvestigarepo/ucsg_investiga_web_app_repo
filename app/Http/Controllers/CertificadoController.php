<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Routing\Route;
use DB;
use App\Model\Dominio;
class CertificadoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){

        $routeName = Request::route()->getName();
        // dd($routeName);

        if($routeName == 'certificado/gestoryrevisor'){
            // dd('true');
            $sql="select us.id,year(us.created_at) ano,us.cedula,us.name nombres,us.email,rol.nombre rol,us.certificado from dbousuario us
        left join dborol rol on rol.id=us.idRol
        where us.idrol in (2,3) order by year(us.created_at),rol.nombre";

            $datos=DB::select($sql);
        
        return view('certificado.gestoryrevisor.index',compact('datos'));
        }

        if($routeName == 'certificado/profesor'){
             // dd('true');
          $dominios=Dominio::select('dbodominio.id')
        ->get();
        $sql="SELECT * FROM (";

        $cantidadDominio=count($dominios);
        //return $cantidadDominio;
        $cont=1;
        foreach ($dominios as $key) {

            if ($cont<$cantidadDominio) {
                $sql=$sql." (SELECT @curRow".$cont." := @curRow".$cont." + 1 AS row_number,TABLA2.idUSuario,TABLA2.ano,TABLA2.dominio,TABLA2.nombrepropuesta,
                    TABLA2.nombre, TABLA2.nota, TABLA2.email, TABLA2.rol, TABLA2.certificado FROM(
                    SELECT TABLA.ano,us.id idUSuario,us.name nombre,us.email,us.certificado,rol.nombre rol,dom.id idDominio,dom.nombre dominio,
            TABLA.idPropuesta,pro.nombrepropuesta,AVG(TABLA.nota) nota 
                                FROM (
                                SELECT year(created_at) ano,idPropuesta,idUsuario,sum(nota) nota 
                                          FROM dbodetallecalificacion
                                GROUP BY year(created_at),idPropuesta,idUsuario
                                ) AS TABLA
                                            left join dbopropuesta pro on pro.id=TABLA.idPropuesta
                                            left join dbodominio dom on dom.id=pro.idDominio
                                            left join dbousuario us on us.id=pro.idUsuario
                                            LEFT JOIN dborol rol ON rol.id = us.idRol
                                            where TABLA.ano=year(curdate())
                                            GROUP BY TABLA.ano,us.name,dom.nombre,TABLA.idPropuesta,pro.nombrepropuesta

                    ) AS TABLA2
                    JOIN    (SELECT @curRow".$cont." := 0) r
                    WHERE TABLA2.idDominio=".$key["id"]." AND TABLA2.ANO=YEAR(CURDATE()) ORDER BY TABLA2.dominio,TABLA2.nota DESC LIMIT 2 ) UNION ALL";
            } else {
                $sql=$sql." (SELECT @curRow".$cont." := @curRow".$cont." + 1 AS row_number,TABLA2.idUSuario,TABLA2.ano,TABLA2.dominio,TABLA2.nombrepropuesta,
                    TABLA2.nombre, TABLA2.nota, TABLA2.email, TABLA2.rol, TABLA2.certificado FROM(
                    SELECT TABLA.ano,us.id idUSuario,us.name nombre,us.email,us.certificado,rol.nombre rol,dom.id idDominio,dom.nombre dominio,
            TABLA.idPropuesta,pro.nombrepropuesta,AVG(TABLA.nota) nota 
                                FROM (
                                SELECT year(created_at) ano,idPropuesta,idUsuario,sum(nota) nota 
                                          FROM dbodetallecalificacion
                                GROUP BY year(created_at),idPropuesta,idUsuario
                                ) AS TABLA
                                            left join dbopropuesta pro on pro.id=TABLA.idPropuesta
                                            left join dbodominio dom on dom.id=pro.idDominio
                                            left join dbousuario us on us.id=pro.idUsuario
                                            LEFT JOIN dborol rol ON rol.id = us.idRol
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

        //     $sql="select us.id,year(us.created_at) ano,us.cedula,us.name nombres,us.email,rol.nombre rol,us.certificado 
        //   from dbousuario us
        // left join dborol rol on rol.id=us.idRol
        // where us.idrol IN (5) order by year(us.created_at),rol.nombre";
        
         return view('certificado.profesor.index',compact('datos','final'));
        }
       
    }

    public function modelo_gestor_revisor($id){
        
        $sql="select us.id,year(us.created_at) ano,us.cedula,us.name nombres,us.email,rol.nombre rol from dbousuario us
        left join dborol rol on rol.id=us.idRol
        where us.id=".$id;

        $datos=DB::select($sql);
        //return $datos;
        $pdf = \PDF::loadView('certificado.gestoryrevisor.modelo',compact('datos'));
        return $pdf->download("CERTIFICADO_GESTOR_REVISOR_UCSG_INVESTIGA.pdf");
        //return view('certificado.modelo',compact('datos'));
    }

    public function modelo_ganadores($id){
         $sql="select us.id,year(us.created_at) ano,us.cedula,us.name nombres,us.email,rol.nombre rol,
        prop.nombrepropuesta nombre_propuesta, domi.nombre as dominio
          from dbousuario us
        left join dborol rol on rol.id=us.idRol
        LEFT JOIN dbopropuesta prop ON prop.idUsuario = us.id
        LEFT JOIN dbodominio domi ON prop.idDominio = domi.id
        where us.id=".$id;

        $datos=DB::select($sql);
        //return $datos;
        $pdf = \PDF::loadView('certificado.profesor.modelo',compact('datos'));
        return $pdf->download("CERTIFICADO_GANADOR_UCSG_INVESTIGA.pdf");
        //return view('certificado.modelo_ganadores',compact('datos'));

    }
}
