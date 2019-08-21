<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Dominio;
use App\Model\Estado;

class DominioControler extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $datos = Dominio::select('dbodominio.*', 'dboestado.nombre as nombreestado')
        ->leftjoin('dboestado', 'dboestado.id', '=', 'dbodominio.estado_id')
        ->get();
        return view('dominio.index',compact('datos'));
    }

    public function crear(){
        return view('dominio.c_dominio');
    }

    public function guardar(Request $request){
        $datos=$request->all();
        Dominio::create([
            "nombre"=>strtoupper($datos["dominio"])
        ]);
        return redirect('/dominio');
    }

    public function actualizar(Request $request)
    {
        $datos = $request->all();
        $id=$datos["id"];
        Dominio::whereId($id)->update([
            "nombre"=>strtoupper($datos["dominio"])
        ]);
        return redirect('/dominio');
    }
   
    public function editar($id)
    {
        $datos= Dominio::findOrFail($id);

        return view('dominio.edit_dominio', compact('datos'));
    }

    public function eliminar($id)
    {
        Dominio::whereId($id)->delete();
        return redirect('/dominio');
    }

    public function cambiaestado($id,$id2)
    {
        Dominio::whereId($id)->update([
            "estado_id"=>$id2
        ]);
        return redirect('/dominio');
    }

}
