<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Publicacion;
use App\User;
use App\Model\Temas;
use App\Model\DetalleCalifica;
use DB;
class RevisionController extends Controller
{
    

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){

        if (auth()->user()->idRol<>1 && auth()->user()->idRol<>2) {
            return view('error.index');
        }

        if(auth()->user()->idRol==1){
            $datos = Publicacion::select('dbopropuesta.*', 'dboestado.nombre as nombreestado', 
            'dbodominio.nombre as nombredominio', 'user1.name as nombreusuario', 'user2.name as gestor', 
            'user3.name as revisor','user4.name as revisor2','user5.name as revisor3')
            ->leftjoin('dboestado', 'dboestado.id', '=', 'dbopropuesta.idEstado')
            ->leftjoin('dbodominio', 'dbodominio.id', '=', 'dbopropuesta.idDominio')
            ->leftjoin('dbousuario as user1', 'user1.id', '=', 'dbopropuesta.idUsuario')
            ->leftjoin('dbousuario as user2', 'user2.id', '=', 'dbopropuesta.gestor_id')
            ->leftjoin('dbousuario as user3', 'user3.id', '=', 'dbopropuesta.revisor_id')
            ->leftjoin('dbousuario as user4', 'user4.id', '=', 'dbopropuesta.revisor_id2')
            ->leftjoin('dbousuario as user5', 'user5.id', '=', 'dbopropuesta.revisor_id3')
            ->where('revisor_id','=',auth()->user()->id)
            ->orWhere('revisor_id2','=',auth()->user()->id)
            ->orWhere('revisor_id3','=',auth()->user()->id)
            ->get();
        }else{
            $datos = Publicacion::select('dbopropuesta.*', 'dboestado.nombre as nombreestado', 
            'dbodominio.nombre as nombredominio', 'user1.name as nombreusuario', 'user2.name as gestor', 
            'user3.name as revisor','user4.name as revisor2','user5.name as revisor3')
            ->leftjoin('dboestado', 'dboestado.id', '=', 'dbopropuesta.idEstado')
            ->leftjoin('dbodominio', 'dbodominio.id', '=', 'dbopropuesta.idDominio')
            ->leftjoin('dbousuario as user1', 'user1.id', '=', 'dbopropuesta.idUsuario')
            ->leftjoin('dbousuario as user2', 'user2.id', '=', 'dbopropuesta.gestor_id')
            ->leftjoin('dbousuario as user3', 'user3.id', '=', 'dbopropuesta.revisor_id')
            ->leftjoin('dbousuario as user4', 'user4.id', '=', 'dbopropuesta.revisor_id2')
            ->leftjoin('dbousuario as user5', 'user5.id', '=', 'dbopropuesta.revisor_id3')
            ->where('revisor_id','=',auth()->user()->id)
            ->orWhere('revisor_id2','=',auth()->user()->id)
            ->orWhere('revisor_id3','=',auth()->user()->id)
            ->get();
        }

        $sql="SELECT TABLA.idPropuesta,AVG(TABLA.nota) nota FROM (
            SELECT idPropuesta,idUsuario,sum(nota) nota FROM dbodetallecalificacion
            GROUP BY idPropuesta,idUsuario
            ) AS TABLA
            GROUP BY TABLA.idPropuesta";
        
        $calificacion=DB::select($sql);
        
        return view('calificacion.index',compact('datos','calificacion'));
    }

   

    public function guardar(Request $request){
        
        $datos = $request->all();
        $idtema=$datos["idtema"];
        $califica=$datos["nota"];
        $idEstado=$datos["idestado"];
       
        $existe=DetalleCalifica::select('dbodetallecalificacion.*')
        ->where('idPropuesta','=',$datos["idpropuesta"])
        ->where('idUsuario','=',auth()->user()->id)
        ->first();

        if ($existe) {
            return redirect()->back()->withErrors(['Estimado usuario, se ha detectado ya un registro de calificación de parte de Ud., no puede nuevamente recalificar.', 'The Message']);
        }

        if ($idEstado==13 || $idEstado==3 || $idEstado==15 || $idEstado==16) { //Revisado o calificado o recalificar
            $flag=0;
            $existe=DetalleCalifica::where('IdPropuesta','=',$datos["idpropuesta"])
            ->where('idUsuario','=',auth()->user()->id)  
            ->delete();

            foreach ($idtema as $key => $value) {
                foreach ($califica as $key2 => $value2) {
                  
                    if ($key==$key2) {
                        DetalleCalifica::create([
                            "idTema"=>$value,
                            "idPropuesta"=>$datos["idpropuesta"],
                            "idUsuario"=>auth()->user()->id,
                            "nota"=>$value2
                        ]);
                        $flag=1;  
                    }
                          
                }
            }
      
            //return redirect('calificacion/aplicanota/'.$datos["idpropuesta"]);
            return redirect('enviarEstadoPropuesta/'.$datos["idpropuesta"].'/'.'calificacion'.'/Calificacion');

        }
        else 
        {
            return redirect()->back()->withErrors(['Estimado usuario, no puede calificar hasta que sea REVISADO por el Gestor.', 'The Message']);
        }
    }

    public function aplicanota($id)
    {
        
        $datos = Publicacion::select('dbopropuesta.*')
        ->where('id','=',$id)        
        ->first();
        $idPropuesta=$datos["id"];
        $temas=Temas::select('dbotemacalificacion.*','dbodetallecalificacion.nota as califica')
        ->leftJoin('dbodetallecalificacion',function($join) use($idPropuesta){
            $join->on('dbodetallecalificacion.idTema','=','dbotemacalificacion.id')
            ->where('dbodetallecalificacion.idPropuesta','=',$idPropuesta)
            ->where('dbodetallecalificacion.idUsuario','=',auth()->user()->id);
        })
        ->where('dbotemacalificacion.tipo','=','REVISOR')
        ->orderby('dbotemacalificacion.id','asc')
        ->get();


        $calificacion = DetalleCalifica::select("dbodetallecalificacion.idPropuesta")
        ->selectRaw('SUM(dbodetallecalificacion.nota) as nota')
        ->where('dbodetallecalificacion.idPropuesta','=',$datos["id"])
        ->where('dbodetallecalificacion.idUsuario','=',auth()->user()->id)
	    ->groupBy("dbodetallecalificacion.idPropuesta")
	    ->first();
        
        return view('calificacion/revision',compact('temas','datos','calificacion'));
    }

}
