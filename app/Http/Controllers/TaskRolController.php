<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRole\ValidationRequest;
use App\Models\TaskRol;
use App\Models\User;
use App\Models\Task;

class TaskRolController extends Controller
{
    public function index()
    {
        $tasks_role=TaskRol::all();
        return view('task-role.Index',compact('tasks_role'));
    }

    public function create()
    {
        $users=User::all();
        $tasks=Task::all();
        return view('task-role.Create',compact('users','tasks'));
    }

    public function store(ValidationRequest $request)
    {
        TaskRol::create($request->all());
        return redirect()->route('task-role.index')->with("success","Registro creado");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
