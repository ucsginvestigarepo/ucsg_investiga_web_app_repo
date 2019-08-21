<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Rol;
class RolController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $datos=Rol::all();
        return view('rol.index',compact('datos'));
    }

    public function crear(){
        return view('rol.c_rol');
    }

    public function guardar(Request $request){
        $datos=$request->all();
        Rol::create([
            "nombre"=>$datos["rol"]
        ]);
        return redirect('/rol');
    }

    public function actualizar(Request $request)
    {
        $datos = $request->all();
        $id=$datos["id"];
        Rol::whereId($id)->update([
            "nombre"=>$datos["rol"]
        ]);
        return redirect('/rol');
    }
   
    public function editar($id)
    {
        $datos= Rol::findOrFail($id);

        return view('rol.edit_rol', compact('datos'));
    }

    public function eliminar($id)
    {
        Rol::whereId($id)->delete();
        return redirect('/rol');
    }
}
