<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use App\Model\Facultad;
use App\Model\Carrera;


class inicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nuevo()
    {
        $facultad=Facultad::all();
        $carrera=Carrera::all();
        return view('auth.nuevo',compact('facultad','carrera'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrar(Request $request)
    {
        
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

        if ($datos["password"]<>$datos["password2"]) {
            //return Redirect::back()->withErrors(['msg', 'The Message']);
            return redirect()->back()->withErrors(['Por favor confirme  correctamente su password, el sistema detecta que no son iguales.', 'The Message']);
                
        }

        $existe=User::select('dbousuario.*')
        ->where('cedula','=',$datos['cedula'])
        ->orWhere('email','=',$datos["email"])
        ->first();

        if ($existe) {
            return redirect()->back()->withErrors(['La cedula o correo electronico ya se encuentra registrado, por favor verifique con el administrador del sistema.', 'The Message']);
        }

        //return $datos;
        $file = $request->file('file');
        $nombre="";
        if ($file<>null){//(strlen($datos["file"])>1) {
          
            $nombre = 'img'.rand(1,99999999).'.jpg';//$file->getClientOriginalName();
            \Storage::disk('local')->put($nombre,  \File::get($file));
        }
        else {
            
            $nombre="";
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
            "idEstado"=>1,
            "idRol"=>6,
            "grado"=>'USER',
            "rutaarchivo"=>$nombre
       ]);
        return redirect('enviarCorreo/'.$datos["cedula"].'/'.$datos["nombre"].'/'.$datos["password"].'/'.$datos["email"]);
        //return redirect('/')->with('flash','Se ha registrado correctamente, por favor inicie sesión con su mail y password'); ;


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function recuperarclave()
    {
        return view ('auth.olvidoclave');
    }
}
