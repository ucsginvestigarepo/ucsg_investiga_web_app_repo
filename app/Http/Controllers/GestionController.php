<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Publicacion;
use App\User;
use App\Model\Temas;
use App\Model\DetalleRevisado;

class GestionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){

        if (auth()->user()->idRol<>1 && auth()->user()->idRol<>3) {
            return view('error.index');
        }

        if(auth()->user()->idRol==1){
            $datos = Publicacion::select('dbopropuesta.*', 'dboestado.nombre as nombreestado', 
            'dbodominio.nombre as nombredominio', 'user1.name as nombreusuario', 'user2.name as gestor', 
            'user3.name as revisor','user4.name as revisor2')
            ->leftjoin('dboestado', 'dboestado.id', '=', 'dbopropuesta.idEstado')
            ->leftjoin('dbodominio', 'dbodominio.id', '=', 'dbopropuesta.idDominio')
            ->leftjoin('dbousuario as user1', 'user1.id', '=', 'dbopropuesta.idUsuario')
            ->leftjoin('dbousuario as user2', 'user2.id', '=', 'dbopropuesta.gestor_id')
            ->leftjoin('dbousuario as user3', 'user3.id', '=', 'dbopropuesta.revisor_id')
            ->leftjoin('dbousuario as user4', 'user4.id', '=', 'dbopropuesta.revisor_id2')
            ->where('gestor_id','=',auth()->user()->id)
            ->orWhere('revisor_id2','=',auth()->user()->id)
            ->get();
        }else{
            $datos = Publicacion::select('dbopropuesta.*', 'dboestado.nombre as nombreestado', 
            'dbodominio.nombre as nombredominio', 'user1.name as nombreusuario', 'user2.name as gestor', 
            'user3.name as revisor','user4.name as revisor2')
            ->leftjoin('dboestado', 'dboestado.id', '=', 'dbopropuesta.idEstado')
            ->leftjoin('dbodominio', 'dbodominio.id', '=', 'dbopropuesta.idDominio')
            ->leftjoin('dbousuario as user1', 'user1.id', '=', 'dbopropuesta.idUsuario')
            ->leftjoin('dbousuario as user2', 'user2.id', '=', 'dbopropuesta.gestor_id')
            ->leftjoin('dbousuario as user3', 'user3.id', '=', 'dbopropuesta.revisor_id')
            ->leftjoin('dbousuario as user4', 'user4.id', '=', 'dbopropuesta.revisor_id2')
            ->where('gestor_id','=',auth()->user()->id)
            ->orWhere('revisor_id2','=',auth()->user()->id)
            ->get();
        }

        $calificacion = DetalleRevisado::select("dbodetallerevision.idPropuesta")
        ->selectRaw('SUM(dbodetallerevision.revisado) as nota')
        ->groupBy("dbodetallerevision.idPropuesta")
	    ->get();
       
        return view('gestion.index',compact('datos','calificacion'));
    }

    public function aplicanota($id)
    {
        
        $datos = Publicacion::select('dbopropuesta.*')
        ->where('id','=',$id)        
        ->first();
        $idPropuesta=$datos["id"];
        
        $temas=Temas::select('dbotemacalificacion.*','dbodetallerevision.revisado as califica')
        ->leftJoin('dbodetallerevision',function($join) use($idPropuesta){
            $join->on('dbodetallerevision.idTema','=','dbotemacalificacion.id')
            ->where('dbodetallerevision.idPropuesta','=',$idPropuesta);
        })
        ->where('dbotemacalificacion.tipo','=','GESTOR')
        ->orderby('dbotemacalificacion.id','asc')
        ->get();
       

        $calificacion = DetalleRevisado::select("dbodetallerevision.idPropuesta")
        ->selectRaw('SUM(dbodetallerevision.revisado) as nota')
        ->where('dbodetallerevision.idPropuesta','=',$datos["id"])
	    ->groupBy("dbodetallerevision.idPropuesta")
	    ->first();
        
        return view('gestion/gestion',compact('temas','datos','calificacion'));
    }

    public function actualizaestado(Request $request)
    {
        $datos=$request->all();
        $id=$datos["idpropuesta"];
        
        $estado=Publicacion::select('dbopropuesta.idEstado')
        ->whereId($id)
        ->first();
        

        if ($estado["idEstado"]==13) {
            return redirect()->back()->withErrors(['No puede rechazar una propuesta calificada.', 'The Message']);
        }
        
        Publicacion::whereId($id)->update([
            "idEstado"=>9,
            "motivorechazo"=>$datos["rechazo"]
        ]);
        return redirect('enviarEstadoPropuesta/'.$id.'/'.'gestionrechazo'.'/Rechazo');
        //return redirect('/gestion');
    }

    public function guardar(Request $request){
        
        $datos = $request->all();
        $contador=0;
        $idEstado=$datos["idestado"];
       
        if ($idEstado==12 || $idEstado==3 || $idEstado==14) { 
           
            $buscar=DetalleRevisado::where('IdPropuesta','=',$datos["idpropuesta"])
            ->where('idUsuario','=',auth()->user()->id) 
            ->delete();

           foreach ($datos['gestion'] as $key => $value) {
                                    
                $existe=DetalleRevisado::select('dbodetallerevision.*')
                ->where('idTema','=',$datos['idtema'][$key])  
                ->where('IdPropuesta','=',$datos["idpropuesta"])
                ->where('idUsuario','=',auth()->user()->id)  
                ->first();

                 
                if (!$existe) { //ingresa el registro
                    
                    DetalleRevisado::create([
                        "idTema"=>$datos['idtema'][$key],
                        "idPropuesta"=>$datos["idpropuesta"],
                        "idUsuario"=>auth()->user()->id,
                        "revisado"=>$value === 'S'?1:0
                    ]);
                    
                    
                } else { //actualiza un nuevo registro
                
                    DetalleRevisado::whereId($existe["id"])->update([
                        "idTema"=>$datos['idtema'][$key],
                        "idPropuesta"=>$datos["idpropuesta"],
                        "idUsuario"=>auth()->user()->id,
                        "revisado"=>$value === 'S'?1:0
                    ]);
                
                }
            }   
            
            $cantidadrevisada=DetalleRevisado::select('dbodetallerevision.revisado')
            ->where('IdPropuesta','=',$datos["idpropuesta"])
            ->get();
            $sumarevisado=0;
            
            foreach ($cantidadrevisada as $key) {
                $sumarevisado=$sumarevisado + $key["revisado"];
            }


            if ($sumarevisado==9) {
                Publicacion::whereId($datos["idpropuesta"])->update([
                    "idEstado"=>3 //REVISADO
                ]);
            }
            else {
                Publicacion::whereId($datos["idpropuesta"])->update([
                    "idEstado"=>14 //EN REVSION
                ]); 
                }
            
            return redirect('enviarEstadoPropuesta/'.$datos["idpropuesta"].'/'.'gestion'.'/Revision');
            //return redirect('gestion/aplicanota/'.$datos["idpropuesta"]);

        }
        else 
        {
            return redirect()->back()->withErrors(['Estimado usuario, no puede revisar, por favor verifique.', 'The Message']);
        }
 
    }

}
