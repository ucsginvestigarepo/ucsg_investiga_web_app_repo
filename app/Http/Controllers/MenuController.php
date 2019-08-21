<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Fases;
use Carbon\Carbon;

class MenuController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $fecha_actual = Carbon::now();
        $date1 = $fecha_actual->format('Y-m-d');
        $fechas=Fases::select('dbofase.*')
        ->where('fechadesde','<=',$date1)
        ->where('fechahasta','>=',$date1)
        ->first();
        return view('menu.inicio',compact('fechas'));
    }

    public function submenu()
    {
      
        return view('menu.subinicio');
    }
}
