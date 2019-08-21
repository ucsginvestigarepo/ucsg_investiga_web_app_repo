<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Fases;
use App\Model\Estado;

class FasesController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }
    
    
    public function index(){
        $datos = Fases::select('dbofase.*','dboestado.nombre as nombreestado')
        ->selectRaw('YEAR(dbofase.fechadesde) as anio')
        ->leftjoin('dboestado', 'dboestado.id', '=', 'dbofase.estado_id')
        ->get();
        return view('fases.index',compact('datos'));
    }

    public function crear(){
        return view('fases.c_fase');
    }

    public function guardar(Request $request){
        $datos=$request->all();

        $ultimaFecha=Fases::selectRaw('MAX(dbofase.fechahasta) as ultima')
        ->first();
        //return $ultimaFecha->ultima.'     '.$datos["desde"];
        if ($datos["desde"] < $ultimaFecha->ultima) {
            return redirect()->back()->withErrors(['Estimado usuario, no puede registrar una fecha menor a '.$ultimaFecha->ultima.', por favor verifique.', 'The Message']);
        } 

        if ($datos["hasta"] < $datos["desde"]) {
            return redirect()->back()->withErrors(['Estimado usuario, la fecha desde no puede ser mayor a fecha hasta, por favor verifique.', 'The Message']);
        }

        Fases::create([
            "nombre"=>strtoupper($datos["nombre"]),
            "fechadesde"=>$datos["desde"],
            "fechahasta"=>$datos["hasta"],
            "estado_id"=>10
        ]);
        return redirect('/fases'); 
    }

    public function actualizar(Request $request)
    {
        $datos = $request->all();
        $id=$datos["id"];

        $ultimaFecha=Fases::selectRaw('MAX(dbofase.fechahasta) as ultima')
        ->first();
        //return $ultimaFecha->ultima.'     '.$datos["desde"];
        if ($datos["hasta"] < $datos["desde"]) {
            return redirect()->back()->withErrors(['Estimado usuario, la fecha desde no puede ser mayor a fecha hasta, por favor verifique.', 'The Message']);
        }

        if ($datos["hasta"] > $ultimaFecha->ultima) {
            return redirect()->back()->withErrors(['Estimado usuario, no puede registrar una fecha mayor a '.$ultimaFecha->ultima.', por favor verifique.', 'The Message']);
        }

        Fases::whereId($id)->update([
            "nombre"=>strtoupper($datos["nombre"]),
            "fechadesde"=>$datos["desde"],
            "fechahasta"=>$datos["hasta"],
            "estado_id"=>10
        ]);
        return redirect('/fases');
    }
   
    public function editar($id)
    {
        $datos= Fases::findOrFail($id);

        return view('fases.edit_fase', compact('datos'));
    }

    public function eliminar($id)
    {
        Fases::whereId($id)->delete();
        return redirect('/fases');
    }
    public function cambiaestado($id,$id2)
    {
        Fases::whereId($id)->update([
            "estado_id"=>$id2
        ]);
        return redirect('/fases');
    }
}
