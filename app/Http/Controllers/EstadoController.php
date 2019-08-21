<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Estado;

class EstadoController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $estado=Estado::all();
        return view('estado.index',compact('estado'));
    }

    public function crear(){
        return view('estado.c_estado');
    }

    public function guardar(Request $request){
        $datos=$request->all();
        Estado::create([
            "nombre"=>strtoupper($datos["estado"])
        ]);
        return redirect('/estado');
    }

    public function actualizar(Request $request)
    {
        $datos = $request->all();
        $id=$datos["id"];
        Estado::whereId($id)->update([
            "nombre"=>strtoupper($datos["estado"])
        ]);
        return redirect('/estado');
    }
   
    public function editar($id)
    {
        $estado= Estado::findOrFail($id);

        return view('estado.edit_estado', compact('estado'));
    }

    public function eliminar($id)
    {
        Estado::whereId($id)->delete();
        return redirect('/estado');
    }

}
