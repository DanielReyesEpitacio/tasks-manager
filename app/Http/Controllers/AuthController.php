<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     public function login(Request $request){
        $credentials = $request->validate([
            "email"=>"required|email",
            "password"=>"required"
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            "credentials"=>"Credenciales inválidas",
        ]);
    }

    public function logout(){
        Auth::logout();
        //$request->session()->invalidate();
        //$request->session()->regenerateToken();
        return redirect()->route('login');
    }

}
