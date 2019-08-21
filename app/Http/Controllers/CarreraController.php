<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Carrera;

class CarreraController extends Controller
{
    //public function __construct(){
      //  $this->middleware('auth');
    //}
    
    public function getCarrera(Request $request,$id){
        if ($request->ajax()) {
           $carrera=Carrera::carreras($id);
           return response()->json($carrera);
        }
        
    }



}
