<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EstadisticaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        
        if (auth()->user()->idRol==6) {
            return view('error.index');
        }
       
        return view('estadistica.index');
    }

    public function listadoprofesores(){
       $sql="select rol.nombre,count(*) cantidad from dbousuario 
       left join dborol rol on rol.id=dbousuario.idRol
       where idrol in (2,3,5,6)
       GROUP BY rol.nombre"; 

       $sql2="select count(*) total from dbousuario
       where idrol in (2,3,5,6)";

       $datos=DB::select($sql);
       $total=DB::select($sql2);
       //return $datos;
       return view('estadistica.listadoprofesores',compact('datos','total'));
    }

    public function listadotema(){
        $sql="select domi.nombre,count(prop.id) cantidad from dbopropuesta prop
        left join dbodominio domi on domi.id=prop.idDominio
        GROUP BY domi.nombre"; 
 
        $datos=DB::select($sql);
        //return $datos;
        return view('estadistica.listadotema',compact('datos'));
     }

      public function listadoFacultades(){
       $sql="select facu.nombre,count(prop.id) cantidad from dbopropuesta prop left join dbousuario user on
           prop.idUsuario = user.id left join dbofacultad facu on
           user.idFacultad = facu.id
           GROUP BY facu.nombre;";

        $datos=DB::select($sql);
        //return $datos;
        return view('estadistica.listadofacultades',compact('datos'));
    }

    public function comparativa_facultades_temas(){
        $sql="SELECT TABLA3.ANO,GROUP_CONCAT(TABLA3.cantidad) cantidad FROM (
            SELECT TABLA2.ano,TABLA2.nombre,IF(ISNULL(TABLA1.cantidad),0,TABLA1.cantidad) cantidad FROM (
                    SELECT '2017' ano,facu.id, facu.nombre,count(prop.id) cantidad from dbopropuesta prop left join dbousuario user on
                                   prop.idUsuario = user.id left join dbofacultad facu on
                                   user.idFacultad = facu.id
                                   GROUP BY facu.nombre,prop.id
                                      UNION ALL
                        SELECT '2018' ano,facu.id,facu.nombre,count(prop.id) cantidad from dbopropuesta prop left join dbousuario user on
                                   prop.idUsuario = user.id left join dbofacultad facu on
                                   user.idFacultad = facu.id
                                   GROUP BY facu.nombre,prop.id
                                      UNION ALL
                        SELECT '2019' ano,facu.id,facu.nombre,count(prop.id) cantidad from dbopropuesta prop left join dbousuario user on
                                   prop.idUsuario = user.id left join dbofacultad facu on
                                   user.idFacultad = facu.id
                                   GROUP BY facu.nombre,prop.id
                    ) AS TABLA2 
            LEFT OUTER JOIN(
             SELECT YEAR(prop.created_at) ano,facu.id AS idFacultad,COUNT(*) cantidad from dbopropuesta prop left join dbousuario user on
                       prop.idUsuario = user.id left join dbofacultad facu on
                        user.idFacultad = facu.id
                        GROUP BY YEAR(created_at),facu.id
            ) AS TABLA1 ON TABLA1.idFacultad=TABLA2.id AND TABLA1.ano=TABLA2.ano
            ) AS TABLA3 GROUP BY TABLA3.ANO";

        $sql2="SELECT nombre FROM dbofacultad";

        $completo=DB::select($sql);
        $comparativa_facultades_temas=DB::select($sql2);
        //return $datos;
        return view('estadistica.comparativa_facultades_temas',compact('completo','comparativa_facultades_temas'));
     }

     public function top10(){
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
            ) AS TABLA2 ORDER BY TABLA2.ANO,TABLA2.nota LIMIT 10"; 
 
        $datos=DB::select($sql);
        //return $datos;
        return view('estadistica.top10',compact('datos'));
     }

     public function rechazadovscalificados(){
        $sql="SELECT est.nombre, COUNT(dbopropuesta.id) cantidad FROM dbopropuesta 
        LEFT JOIN dboestado est on est.id=dbopropuesta.idEstado
        WHERE dbopropuesta.idEstado in (9,13) and year(dbopropuesta.created_at)=year(CURDATE())
        GROUP BY est.nombre"; 
 
        $datos=DB::select($sql);
        //return $datos;
        return view('estadistica.rvsc',compact('datos'));
     }

     public function comparativa_dominios_temas(){
        $sql="SELECT TABLA3.ANO,GROUP_CONCAT(TABLA3.cantidad) cantidad FROM (
            SELECT TABLA2.ano,TABLA2.nombre,IF(ISNULL(TABLA1.cantidad),0,TABLA1.cantidad) cantidad FROM (
            SELECT '2017' ano,id,nombre FROM dbodominio
            UNION ALL
            SELECT '2018' ano,id,nombre FROM dbodominio
            UNION ALL
            SELECT '2019' ano,id,nombre FROM dbodominio
            ) AS TABLA2 
            LEFT OUTER JOIN(
            SELECT YEAR(created_at) ano,idDominio,COUNT(*) cantidad FROM dbopropuesta
            GROUP BY YEAR(created_at),idDominio
            ) AS TABLA1 ON TABLA1.idDominio=TABLA2.id AND TABLA1.ano=TABLA2.ano
            ) AS TABLA3 GROUP BY TABLA3.ANO"; 
        $sql2="SELECT nombre FROM dbodominio";

        $completo=DB::select($sql);
        $comparativa_dominios_temas=DB::select($sql2);
        //return $datos;
        return view('estadistica.comparativa_dominios_temas',compact('completo','comparativa_dominios_temas'));
     }

    public function comparativa_usuarios_rol(){
        $sql="SELECT TABLA3.ANO,GROUP_CONCAT(TABLA3.cantidad) cantidad FROM (
            SELECT TABLA2.ano,TABLA2.nombre,IF(ISNULL(TABLA1.cantidad),0,TABLA1.cantidad) cantidad FROM (
                    SELECT '2017' ano,rol.id,rol.nombre FROM dbousuario user LEFT JOIN  dborol rol ON
                        rol.id = user.idRol
                        WHERE user.idRol IN (2,3,5,6)
                            GROUP BY rol.nombre, rol.id UNION ALL
                        SELECT '2018' ano,rol.id,rol.nombre FROM dbousuario user LEFT JOIN  dborol rol ON
                            rol.id = user.idRol
                            WHERE user.idRol IN (2,3,5,6)
                            GROUP BY rol.nombre, rol.id UNION ALL
                        SELECT '2019' ano,rol.id,rol.nombre FROM dbousuario user LEFT JOIN  dborol rol ON
                           rol.id = user.idRol
                           WHERE user.idRol IN (2,3,5,6)
                            GROUP BY rol.nombre, rol.id
                    ) AS TABLA2 
            LEFT OUTER JOIN(
            SELECT YEAR(created_at) ano,idRol,COUNT(*) cantidad FROM dbousuario
                GROUP BY YEAR(created_at),idRol
            ) AS TABLA1 ON TABLA1.idRol=TABLA2.id AND TABLA1.ano=TABLA2.ano
            ) AS TABLA3 GROUP BY TABLA3.ANO";

        $sql2="SELECT rol.nombre FROM dbousuario USER LEFT JOIN dborol rol ON
            rol.id = USER.idRol
            WHERE rol.id in (2,3,5,6)
            GROUP BY rol.nombre";
        $completo=DB::select($sql);
        $usuarios_rol_comparativa =DB::select($sql2);
        //return $datos;
        return view('estadistica.comparativa_usuarios_rol',compact('completo','usuarios_rol_comparativa'));
     }

    public function rechazadosvscalificados_comparativa(){
         $sql="SELECT TABLA3.ANO,GROUP_CONCAT(TABLA3.cantidad) cantidad FROM (
            SELECT TABLA2.ano,TABLA2.nombre,IF(ISNULL(TABLA1.cantidad),0,TABLA1.cantidad) cantidad FROM (
            SELECT '2017' ano,est.id,est.nombre FROM dbopropuesta prop LEFT JOIN dboestado est ON
            est.id=prop.idEstado
            WHERE prop.idEstado in (9,13)
                GROUP BY est.id,est.nombre UNION ALL
            SELECT '2018' ano,est.id,est.nombre FROM dbopropuesta prop LEFT JOIN dboestado est ON
                        est.id=prop.idEstado
                        WHERE prop.idEstado in (9,13)
                            GROUP BY est.id,est.nombre UNION ALL
            SELECT '2019' ano,est.id,est.nombre FROM dbopropuesta prop LEFT JOIN dboestado est ON
                        est.id=prop.idEstado
                        WHERE prop.idEstado in (9,13)
                            GROUP BY est.id,est.nombre
                    ) AS TABLA2 
            LEFT OUTER JOIN(
            SELECT YEAR(created_at) ano,idEstado,COUNT(*) cantidad FROM dbopropuesta
                GROUP BY YEAR(created_at),idEstado
            ) AS TABLA1 ON TABLA1.idEstado=TABLA2.id AND TABLA1.ano=TABLA2.ano
            ) AS TABLA3 GROUP BY TABLA3.ANO";
        
        $sql2="SELECT est.nombre FROM dbopropuesta 
        LEFT JOIN dboestado est on est.id=dbopropuesta.idEstado
        WHERE dbopropuesta.idEstado in (9,13)
        GROUP BY est.nombre"; 
 
        $completo=DB::select($sql);
        $rechazadosvscalificados_comparativa =DB::select($sql2);
        //return $datos;
        return view('estadistica.rechazadosvscalificados_comparativa',compact('completo','rechazadosvscalificados_comparativa'));
     }

     public function dashboard_comparativo(){
       $sql_user_rol_dash_anio_2017 ="SELECT '2017' AS ano,rol.nombre,count(*) cantidad from dbousuario usr
       left join dborol rol on rol.id=usr.idRol
       WHERE rol.id in (2,3,5,6) AND YEAR(usr.created_at) = '2017'
       GROUP BY rol.nombre";

       $sql_user_rol_dash_anio_2018 ="SELECT '2018' AS ano,rol.nombre,count(*) cantidad from dbousuario usr
       left join dborol rol on rol.id=usr.idRol
       WHERE rol.id in (2,3,5,6) AND YEAR(usr.created_at) = '2018'
       GROUP BY rol.nombre";

       $sql_user_rol_dash_anio_2019 = "SELECT '2019' AS ano,rol.nombre,count(*) cantidad from dbousuario usr
       left join dborol rol on rol.id=usr.idRol
       WHERE rol.id in (2,3,5,6) AND YEAR(usr.created_at) = '2019'
       GROUP BY rol.nombre";

       $sql_temas_dominio_2017 = "SELECT '2017' AS ano,dom.nombre as nombre,count(*) cantidad FROM dbodominio dom
       left join dbopropuesta prop ON prop.idDominio = dom.id   
     WHERE YEAR(prop.created_at) = '2017'
       GROUP BY dom.nombre";

         $sql_temas_dominio_2018 = "SELECT '2018' AS ano,dom.nombre as nombre,count(*) cantidad FROM dbodominio dom
       left join dbopropuesta prop ON prop.idDominio = dom.id   
     WHERE YEAR(prop.created_at) = '2018'
       GROUP BY dom.nombre";

         $sql_temas_dominio_2019 = "SELECT '2019' AS ano,dom.nombre as nombre,count(*) cantidad FROM dbodominio dom
       left join dbopropuesta prop ON prop.idDominio = dom.id   
     WHERE YEAR(prop.created_at) = '2019'
       GROUP BY dom.nombre";

       $sql_temas_facultad_2017 = "SELECT '2017' AS ano,facu.nombre,count(prop.id) cantidad from dbopropuesta prop left join dbousuario user on
           prop.idUsuario = user.id left join dbofacultad facu on
           user.idFacultad = facu.id
           WHERE YEAR(prop.created_at) = '2017'
           GROUP BY facu.nombre";

        $sql_temas_facultad_2018 = "SELECT '2018' AS ano,facu.nombre,count(prop.id) cantidad from dbopropuesta prop left join dbousuario user on
           prop.idUsuario = user.id left join dbofacultad facu on
           user.idFacultad = facu.id
           WHERE YEAR(prop.created_at) = '2018'
           GROUP BY facu.nombre";

         $sql_temas_facultad_2019 = "SELECT '2019' AS ano,facu.nombre,count(prop.id) cantidad from dbopropuesta prop left join dbousuario user on
           prop.idUsuario = user.id left join dbofacultad facu on
           user.idFacultad = facu.id
           WHERE YEAR(prop.created_at) = '2019'
           GROUP BY facu.nombre";

        $sql_top10_profesores_2017 = "SELECT * FROM (
            SELECT TABLA.ano,us.name nombre,dom.nombre dominio,TABLA.idPropuesta,pro.nombrepropuesta,AVG(TABLA.nota) nota FROM (
                        SELECT year(created_at) ano,idPropuesta,idUsuario,sum(nota) nota FROM dbodetallecalificacion
                        GROUP BY year(created_at),idPropuesta,idUsuario
                        ) AS TABLA
                                    left join dbopropuesta pro on pro.id=TABLA.idPropuesta
                                    left join dbodominio dom on dom.id=pro.idDominio
                                    left join dbousuario us on us.id=pro.idUsuario
                                    where TABLA.ano='2017'
                                    GROUP BY TABLA.ano,us.name,dom.nombre,TABLA.idPropuesta,pro.nombrepropuesta
            ) AS TABLA2 ORDER BY TABLA2.ANO,TABLA2.nota LIMIT 10";

        $sql_top10_profesores_2018 = "SELECT * FROM (
            SELECT TABLA.ano,us.name nombre,dom.nombre dominio,TABLA.idPropuesta,pro.nombrepropuesta,AVG(TABLA.nota) nota FROM (
                        SELECT year(created_at) ano,idPropuesta,idUsuario,sum(nota) nota FROM dbodetallecalificacion
                        GROUP BY year(created_at),idPropuesta,idUsuario
                        ) AS TABLA
                                    left join dbopropuesta pro on pro.id=TABLA.idPropuesta
                                    left join dbodominio dom on dom.id=pro.idDominio
                                    left join dbousuario us on us.id=pro.idUsuario
                                    where TABLA.ano='2018'
                                    GROUP BY TABLA.ano,us.name,dom.nombre,TABLA.idPropuesta,pro.nombrepropuesta
            ) AS TABLA2 ORDER BY TABLA2.ANO,TABLA2.nota LIMIT 10";

        $sql_top10_profesores_2019 = "SELECT * FROM (
            SELECT TABLA.ano,us.name nombre,dom.nombre dominio,TABLA.idPropuesta,pro.nombrepropuesta,AVG(TABLA.nota) nota FROM (
                        SELECT year(created_at) ano,idPropuesta,idUsuario,sum(nota) nota FROM dbodetallecalificacion
                        GROUP BY year(created_at),idPropuesta,idUsuario
                        ) AS TABLA
                                    left join dbopropuesta pro on pro.id=TABLA.idPropuesta
                                    left join dbodominio dom on dom.id=pro.idDominio
                                    left join dbousuario us on us.id=pro.idUsuario
                                    where TABLA.ano='2019'
                                    GROUP BY TABLA.ano,us.name,dom.nombre,TABLA.idPropuesta,pro.nombrepropuesta
            ) AS TABLA2 ORDER BY TABLA2.ANO,TABLA2.nota LIMIT 10";

        $sql_rechazados_calificados2017 = "SELECT '2017' AS ano, est.nombre, COUNT(dbopropuesta.id) cantidad FROM dbopropuesta 
        LEFT JOIN dboestado est on est.id=dbopropuesta.idEstado
        WHERE dbopropuesta.idEstado in (9,13) and year(dbopropuesta.created_at)='2017'
        GROUP BY est.nombre";
        $sql_rechazados_calificados2018 = "SELECT '2017' AS ano, est.nombre, COUNT(dbopropuesta.id) cantidad FROM dbopropuesta 
        LEFT JOIN dboestado est on est.id=dbopropuesta.idEstado
        WHERE dbopropuesta.idEstado in (9,13) and year(dbopropuesta.created_at)='2018'
        GROUP BY est.nombre";
         $sql_rechazados_calificados2019 = "SELECT '2017' AS ano, est.nombre, COUNT(dbopropuesta.id) cantidad FROM dbopropuesta 
        LEFT JOIN dboestado est on est.id=dbopropuesta.idEstado
        WHERE dbopropuesta.idEstado in (9,13) and year(dbopropuesta.created_at)='2019'
        GROUP BY est.nombre";


       $datos_user_rol_dash_anio_2017=DB::select($sql_user_rol_dash_anio_2017);
       $datos_user_rol_dash_anio_2018=DB::select($sql_user_rol_dash_anio_2018);
       $datos_user_rol_dash_anio_2019=DB::select($sql_user_rol_dash_anio_2019);

       $datos_temas_dominio_2017=DB::select($sql_temas_dominio_2017);
       $datos_temas_dominio_2018=DB::select($sql_temas_dominio_2018);
       $datos_temas_dominio_2019=DB::select($sql_temas_dominio_2019);

       $datos_temas_facultad_2017=DB::select($sql_temas_facultad_2017);
       $datos_temas_facultad_2018=DB::select($sql_temas_facultad_2018);
       $datos_temas_facultad_2019=DB::select($sql_temas_facultad_2019);

       $datos_top10_profesores_2017=DB::select($sql_top10_profesores_2017);
       $datos_top10_profesores_2018=DB::select($sql_top10_profesores_2018);
       $datos_top10_profesores_2019=DB::select($sql_top10_profesores_2019);

       $datos_rechazados_calificados2017=DB::select($sql_rechazados_calificados2017);
       $datos_rechazados_calificados2018=DB::select($sql_rechazados_calificados2018);
       $datos_rechazados_calificados2019=DB::select($sql_rechazados_calificados2019);
       
       //return $datos;
       return view('estadistica.dashboard_comparativo',compact('datos_user_rol_dash_anio_2017','datos_user_rol_dash_anio_2018','datos_user_rol_dash_anio_2019','datos_temas_dominio_2017','datos_temas_dominio_2018','datos_temas_dominio_2019','datos_temas_facultad_2017','datos_temas_facultad_2018','datos_temas_facultad_2019','datos_top10_profesores_2017','datos_top10_profesores_2018','datos_top10_profesores_2019','datos_rechazados_calificados2017','datos_rechazados_calificados2018','datos_rechazados_calificados2019'));
    }     
}

