<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Publicacion;
use App\Model\Dominio;
use App\Model\Fases;
use DB;
class PublicacionController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        
        if (auth()->user()->idRol<>1 && auth()->user()->idRol<>5) {
            return view('error.index');
        }

        $sql="SELECT TABLA.idPropuesta,AVG(TABLA.nota) nota FROM (
            SELECT idPropuesta,idUsuario,sum(nota) nota FROM dbodetallecalificacion
            GROUP BY idPropuesta,idUsuario
            ) AS TABLA
            GROUP BY TABLA.idPropuesta";
        
        $calificacion=DB::select($sql);
        
        $datos = Publicacion::select('dbopropuesta.*', 'dboestado.nombre as nombreestado')
            ->leftjoin('dboestado', 'dboestado.id', '=', 'dbopropuesta.idestado')
            ->where('idUsuario','=',auth()->user()->id)
            ->get();
        return view('publicacion.index',compact('datos','calificacion'));
    }

    public function crear(){
        $fases=Fases::select('dbofase.*')
        ->where('id', '=', 5)
        ->get();
        $dominio=Dominio::all();
        return view('publicacion.c_publicacion',compact('dominio','fases'));
    }

    public function guardar(Request $request){
        //return $request;
        $datos=$request->all();
        $checkboxValue = $request->get('termino') == 'on' ? true : false;
        $file = $request->file('file');
         //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
        $nombre=$datos["idusuario"].'_'.$nombre;
        
        $existe=Publicacion::select('dbopropuesta.*')
                -> where('idUsuario','=',$datos["idusuario"])
                -> where('idEstado','<>','9')
                ->get();
        
        if (count($existe)>=1) {
            //return Redirect::back()->withErrors(['msg', 'The Message']);
            return redirect()->back()->withErrors(['Estimado usuario, no puede registrar mas de una propuesta dentro del sistema.', 'The Message']);
                
        } 
        
        $existe2=Publicacion::select('dbopropuesta.*')
                -> where('nombrepropuesta','=',strtoupper($datos["nombre"]))
                ->get();
        
        if (count($existe2)>=1) {
            //return Redirect::back()->withErrors(['msg', 'The Message']);
            return redirect()->back()->withErrors(['Estimado usuario, la propuesta que Ud. esta ingresando ya se encuentra registrada, por favor verifique.', 'The Message']);
                
        } 

        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));
 
        $propuesta=Publicacion::create([
            "nombrepropuesta"=>strtoupper($datos["nombre"]),
            "palabraclave"=>strtoupper($datos["clave"]),
            "descripciontema"=>strtoupper($datos["descripcion"]),
            "problema"=>strtoupper($datos["problema"]),
            "solucionproblema"=>strtoupper($datos["solucion"]),
            "rutaarchivo"=>$nombre,
            "aceptatermino"=>$checkboxValue,
            "idUsuario"=> auth()->user()->id,
            "idEstado"=>'2',
            "idFase"=>$datos["fase"],
            "idDominio"=>$datos["dominio"]
         
        ]);
        return redirect('enviarEstadoPropuesta/'.$propuesta->id.'/publicacion/Registro'); 
        //return redirect('/publicacion');
    }

    public function actualizar(Request $request)
    {
        $datos = $request->all();
        $checkboxValue = $request->get('termino') == 'on' ? true : false;
        $file = $request->file('file');
         //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
 
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));
        $id=$datos["id"];
        

        $existe=Publicacion::select('dbopropuesta.*')
                -> where('idUsuario','=',auth()->user()->id)
                -> where('idEstado','<>','9')
                ->first();
       

        if ($existe["idEstado"]<>'2') {
            return redirect()->back()->withErrors(['Estimado usuario, ya no puede editar la propuesta.', 'The Message']);
        }

        Publicacion::whereId($id)->update([
            "nombrepropuesta"=>strtoupper($datos["nombre"]),
            "palabraclave"=>strtoupper($datos["clave"]),
            "descripciontema"=>strtoupper($datos["descripcion"]),
            "problema"=>strtoupper($datos["problema"]),
            "solucionproblema"=>strtoupper($datos["solucion"]),
            "rutaarchivo"=>$nombre,
            "aceptatermino"=>$checkboxValue,
            "idEstado"=>'2',
            "idFase"=>'3',
            "idDominio"=>$datos["dominio"]
        ]);
        return redirect('/publicacion');
    }
   
    public function editar($id)
    {
        $datos= Publicacion::findOrFail($id);
        $dominio=Dominio::all();
        return view('publicacion.edit_publicacion', compact('datos'), compact('dominio'));
    }

    public function eliminar($id)
    {
        Publicacion::whereId($id)->delete();
        return redirect('/publicacion');
    }
}
