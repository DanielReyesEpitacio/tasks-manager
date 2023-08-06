<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Rol\StoreRequest;
use App\Models\Rol;

class RolController extends Controller
{
    public function index()
    {
        $roles=Rol::all();
        return view('rol.Index', compact('roles'));
    }

    public function create()
    {
        return view('rol.Create');
    }

    public function store(StoreRequest $request)
    {
        Rol::create($request->all());
        return redirect()->route("roles.index")->with("success","Registro creado");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $rol=Rol::find($id);
        if($rol==null){
            return redirect()->route('roles.index')->with("error","Registro no encontrado");
        }
        return view('rol.Edit',compact('rol'));
    }

    public function update(StoreRequest $request, $id)
    {
        $rol=Rol::find($id);
        if($rol==null){
            return redirect()->route('roles.index')->with("error","Registro no encontrado");
        }
        $rol->update($request->all());
        return redirect()->route('roles.index')->with("success","Registro actualizado");
    }

    public function destroy($id)
    {
        $rol=Rol::find($id);
        if($rol ==null){
            return redirect()->route('roles.index')->witdh("error","No se encontró el registro");
        }
        $rol->delete();
        return redirect()->route('roles.index')->with('success',"Registro eliminado");
    }
}
