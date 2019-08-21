<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
   
   public function __construct(){
       $this->middleware('guest',['only' => 'ShowLoginForm']);
   }
   public function ShowLoginForm(){
       return view('index');
   }
   
    public function index(){
        return view('index');
    }
    
    public function register(){
        return view('auth.register');
    }
   
   public function store(Request $request){

        $this->validate(request(),[
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);


        if (Auth::validate(['email' => $request->email, 'password' => $request->password]))
        {
            $inicio = User::select('dbousuario.*')->where('email',  $request->email)->first();
            return view('menu.inicio',compact('inicio'));
                       
        }else{
           
            return redirect()->back()->withErrors(['error'=>'Las credenciales no son validas.'])
                             ->withInput(request(['email']));
        }
        
   }

   public function logout(){
        Auth::logout();
        return redirect('/');
    }

}
