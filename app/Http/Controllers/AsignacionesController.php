<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Publicacion;
use App\User;

class AsignacionesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){

        if (auth()->user()->idRol<>1) {
            return view('error.index');
        }

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
        ->get();
        return view('asignaciones.index',compact('datos'));
    }

    public function crear(){
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
        ->get();
        $gestores=User::select ('dbousuario.*')
        ->where('dbousuario.idestado','=','10')
        ->whereIn('dbousuario.idrol', [3])
        ->get();
        $revisores=User::select ('dbousuario.*')
        ->whereIn('dbousuario.idrol', [2])
        ->where('dbousuario.idestado','=','10')
        ->get();
        return view('asignaciones.c_asignacion',compact('datos','gestores','revisores'));
    }

    public function guardar(Request $request){
        
        $datos = $request->all();
        /*
        $validator = \Validator::make($datos, array(
            'gestor' => 'required', 
            'revisor' => 'required',
            'revisor2' => 'required',
            'revisor3'   => 'required',
        ));
        
        if ($validator->fails())
        {
            return redirect()->back()->withErrors(['Estimado usuario, cada propuesta debe de asignarle una persona.', 'The Message']);
        }*/
        

        $id=$datos["id"];

        $verifica=Publicacion::select('dbopropuesta.idEstado')
        ->where('id','=',$id)
        ->first();

        if ($verifica["idEstado"]==2 || $verifica["idEstado"]==12 ) {
            Publicacion::whereId($id)->update([
                "gestor_id"=>$datos["gestor"],
                "revisor_id"=>$datos["revisor"],
                "revisor_id2"=>$datos["revisor2"],
                "revisor_id3"=>$datos["revisor3"],
                "idEstado"=>12
            ]);
            //return redirect('asignaciones/crear');
            //$direccion[0]="asignaciones/crear";
            return redirect('enviarEstadoPropuesta/'.$id.'/asignacion/Asignacion');

        } else {
            return redirect()->back()->withErrors(['Estimado usuario, no puede registrar mas asignaciones ya que la propuesta entro a proceso de revisión o calificación.', 'The Message']);
        }
        
      
    }

    public function cambiaestado($id,$id2)
    {
        $existe=Publicacion::select('dbopropuesta.idEstado')
        ->where('id','=',$id)
        ->first();

        if ($existe["idEstado"]==2 || $existe["idEstado"]==12) {
            Publicacion::whereId($id)->update([
                "idEstado"=>$id2,
                "gestor_id"=>0,
                "revisor_id"=>0,
                "revisor_id2"=>0,
                "revisor_id3"=>0
            ]);
            return redirect('/asignaciones');
        }else{
            return redirect()->back()->withErrors(['Estimado usuario, no puede desasignar la propuesta seleccionada.', 'The Message']);
        }
        
        
        
    }
}
