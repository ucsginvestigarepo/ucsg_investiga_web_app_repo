<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Facultad;
class FacultadController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $datos = Facultad::select('dbofacultad.*')
        ->get();
        return view('facultad.index',compact('datos'));
    }

    public function crear(){
        return view('facultad.c_facultad');
    }

    public function guardar(Request $request){
        $datos=$request->all();
        Facultad::create([
            "nombre"=>strtoupper($datos["facultad"])
        ]);
        return redirect('/facultad');
    }

    public function actualizar(Request $request)
    {
        $datos = $request->all();
        $id=$datos["id"];
        Facultad::whereId($id)->update([
            "nombre"=>strtoupper($datos["facultad"])
        ]);
        return redirect('/facultad');
    }
   
    public function editar($id)
    {
        $datos= Facultad::findOrFail($id);

        return view('facultad.edit_facultad', compact('datos'));
    }

    public function eliminar($id)
    {
        Facultad::whereId($id)->delete();
        return redirect('/facultad');
    }

    public function cambiaestado($id,$id2)
    {
        Facultad::whereId($id)->update([
            "idEstado"=>$id2
        ]);
        return redirect('/facultad');
    }
}
