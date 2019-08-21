<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
   
   public function __construct(){
       $this->middleware('guest',['only'=>'showLoginForm']);
   }
   
   public function showLoginForm(){
        return view('auth.login');
   }

   
   
    public function login(){
       $credenciales=$this->validate(request(),[
            'email'=>'email|required|string',
            'password'=>'required|string'
       ]);
        
        if (Auth::attempt($credenciales))
        {
            return redirect()->route('menu');
        }
        return back()
        ->withErrors(['email'=>'Estas credenciales no son válidas'])
        ->withInput(request(['email']));
         

   }

   public function return(){
       return redirect('/');
   } 

   public function logout(){
       Auth::logout();
       return redirect('/');
   }

}
