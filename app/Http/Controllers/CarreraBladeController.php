<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Carrera;
use App\Model\Facultad;

class CarreraBladeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $datos = Carrera::select('dbocarrera.*','dbofacultad.nombre as nombrefacultad')
        ->leftjoin('dboFacultad', 'dbofacultad.id', '=', 'dbocarrera.idFacultad')
        ->orderBy('dbofacultad.nombre', 'ASC')
        ->get();
        return view('carrera.index',compact('datos'));
    }

    public function crear(){
        $facultad=Facultad::all();
        return view('carrera.c_carrera',compact('facultad'));
    }

    public function guardar(Request $request){
        $datos=$request->all();
        Carrera::create([
            "nombre"=>strtoupper($datos["carrera"]),
            "idFacultad"=>$datos["facultad"]
        ]);
        return redirect('/carrera');
    }

    public function actualizar(Request $request)
    {
        $datos = $request->all();
        $id=$datos["id"];
        Carrera::whereId($id)->update([
            "nombre"=>strtoupper($datos["carrera"]),
            "idFacultad"=>$datos["facultad"]
        ]);
        return redirect('/carrera');
    }
   
    public function editar($id)
    {
        $datos= Carrera::findOrFail($id);
        $facultad=Facultad::all();
        return view('carrera.edit_carrera', compact('datos','facultad'));
    }

    public function eliminar($id)
    {
        Carrera::whereId($id)->delete();
        return redirect('/carrera');
    }

    public function cambiaestado($id,$id2)
    {
        Carrera::whereId($id)->update([
            "idEstado"=>$id2
        ]);
        return redirect('/carrera');
    }
}
