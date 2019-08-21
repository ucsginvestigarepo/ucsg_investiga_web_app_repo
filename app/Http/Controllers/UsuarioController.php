<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Model\Fases;
use App\Model\Estado;
use App\Model\Facultad;
use App\Model\Carrera;
use App\Model\Rol;
use App\User;

class UsuarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
        
    public function index(){

        if (auth()->user()->idRol<>1) {
           return view('error.index');
        }

        $datos = User::select('dbousuario.*','dboestado.nombre as nombreestado','dborol.nombre as nombrerol')
        ->leftjoin('dboestado', 'dboestado.id', '=', 'dbousuario.idEstado')
        ->leftjoin('dborol', 'dborol.id', '=', 'dbousuario.idRol')
        ->get();
        return view('usuarios.index',compact('datos'));
    }

    public function cambioclave(){
       
        return view('usuarios.cambioclave');
    }

    public function olvidoclave(){
       
        return view('usuarios.olvidoclave');
    }

    public function actualizarclave(Request $request){
        $datos=$request->all();
        $id=auth()->user()->id;

        $valida=Hash::check($datos["claveant"], auth()->user()->password);

        if ($valida) {
                 
            User::whereId($id)->update([
                "password"=>Hash::make($datos["clavenew"]),
                "integra"=>$datos["clavenew"],
            ]);
            return redirect()->back()->withErrors(['Se procedio a actualizar la clave.', 'The Message']);

        } else {
            return redirect()->back()->withErrors(['No se puede cambiar la clave, ya que su clave anterior no es valida.', 'The Message']);
        }
    }

    public function crear(){
        $facultad=Facultad::all();
        $carrera=Carrera::all();
        $rol=Rol::all();
        return view('usuarios.c_usuario',compact('facultad','carrera','rol'));
    }

    public function guardar(Request $request){
        $datos=$request->all();
        
        if (strlen($datos["cedula"])<10 ||  strlen($datos["celular"])<10) {
            //return Redirect::back()->withErrors(['msg', 'The Message']);
            return redirect()->back()->withErrors(['Por favor el número de cédula o celular debe ser de 10 caracteres.', 'The Message']);
                
        } 

        $a=new ValidarController();

        $escedula=$a->validarCedula($datos["cedula"]);

        if (!$escedula || $datos["cedula"]=='9999999999') {
            return redirect()->back()->withErrors(['El número de cedula ingresado no paso la prueba del Digito Verificador, por favor verifique.', 'The Message']);
        }

        $existe=User::select('dbousuario.*')
        ->where('cedula','=',$datos['cedula'])
        ->orWhere('email','=',$datos["email"])
        ->first();

        if ($existe) {
            return redirect()->back()->withErrors(['La cedula o correo electronico ya se encuentra registrado, por favor verifique con el administrador del sistema.', 'The Message']);
        }


        User::create([
            "name"=>$datos["nombre"],
            "email"=>$datos["email"],
            "password"=>Hash::make($datos["password"]),
            "integra"=>$datos["password"],
            "cedula"=>$datos["cedula"],
            "direccion"=>$datos["direccion"],
            "telefono"=>$datos["telefono"],
            "idFacultad"=>$datos["facultad"],
            "idCarrera"=>$datos["carrera"],
            "celular"=>$datos["celular"],
            "idEstado"=>10,
            "idRol"=>$datos["rol"],
            "grado"=>'USER'
        ]);
        return redirect('/usuarios');
    }

    public function actualizar(Request $request)
    {
        $datos = $request->all();

        if (strlen($datos["cedula"])<10) {
            //return Redirect::back()->withErrors(['msg', 'The Message']);
            return redirect()->back()->withErrors(['Por favor el número de cédula debe ser de 10 caracteres.', 'The Message']);
                
        }
        
        $a=new ValidarController();

        $escedula=$a->validarCedula($datos["cedula"]);

        if (!$escedula || $datos["cedula"]=='9999999999') {
            return redirect()->back()->withErrors(['El número de cedula ingresado no paso la prueba del Digito Verificador, por favor verifique.', 'The Message']);
        }

        
        $id=$datos["id"];
        User::whereId($id)->update([
            "name"=>$datos["nombre"],
            "email"=>$datos["email"],
            //"password"=>Hash::make($datos["password"]),
            "cedula"=>$datos["cedula"],
            "direccion"=>$datos["direccion"],
            "telefono"=>$datos["telefono"],
            "idFacultad"=>$datos["facultad"],
            "idCarrera"=>$datos["carrera"],
            "celular"=>$datos["celular"],
            "idEstado"=>10,
            "idRol"=>$datos["rol"],
            "grado"=>'USER'
        ]);
        return redirect('/usuarios');
    }
   
    public function editar($id)
    {
        $facultad=Facultad::all();
        $rol=Rol::all();
        $estado=Estado::all();
        $datos= User::findOrFail($id);
        $carrera=Carrera::select('dbocarrera.*')
        ->where('idFacultad','=',$datos->idFacultad)
        ->get();
        return view('usuarios.edit_usuario', compact('datos','facultad','carrera','rol','estado'));
    }

    public function eliminar($id)
    {
        Fases::whereId($id)->delete();
        return redirect('/fases');
    }
    public function cambiaestado($id,$id2)
    {
        User::whereId($id)->update([
            "idEstado"=>$id2
        ]);
        return redirect('/usuarios');
    }

    
}
