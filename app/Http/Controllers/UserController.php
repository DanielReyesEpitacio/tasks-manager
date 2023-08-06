<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\UserValidationRequest;
use App\Http\Requests\User\UpdateRequest;
use Illuminate\Support\Facades\Hash;
Use App\Models\User;
use App\Models\Rol;

class UserController extends Controller
{
    public function index()
    {
        $users=User::with('rol')->get();
        return view('user.Index',compact('users'));
    }

    public function create()
    {
        $roles=Rol::all();
        return view('user.Create',compact('roles'));
    }

    public function store(UserValidationRequest $request)
    {
        $request->merge(["password"=>Hash::make($request->input('password'))]);
        User::create($request->all());
        return redirect()->route('user.index')->with('success',"Registro creado");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user=User::find($id);
        $roles=Rol::all();
        if($user == null){
            return redirect()->route('user.index')->with("error","No se encontró el usuario");
        }
        return view('user.Edit',compact('user','roles'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $user=User::find($id);
        if($user == null){
            return redirect()->route('user.index')->with("error","El usuario no existe");
        }
        
        if($request->filled(["password"])){
            $request->merge(["password"=>Hash::make($request->input("password"))]);
        }
        
        $user->update($request->filled(['password']) ? $request->all(): $request->except('password'));
        return redirect()->route('user.index')->with("success","Usuario actualizado");
    }

    public function destroy($id)
    {
        $user=User::find($id);
        if($user == null){
            return redirect()->route('user.index')->with("error","No se encontró el registro");
        }
        $user->delete();
        return redirect()->route('user.index')->with("success","Registro eliminado");
    }
}
