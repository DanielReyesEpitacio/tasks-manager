<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Task\TaskValidationRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks=Task::all();
        return view('task.Index',compact('tasks'));
    }

    public function create()
    {
        return view('task.Create');
    }

    public function store(TaskValidationRequest $request)
    {
        Task::create($request->all());
        return redirect()->route('task.index')->with("success","Registro creado");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $task=Task::find($id);
        if($task == null){
            return redirect()->route('task.index')->with("error","No se encontró el registro");
        }
        return view('task.Edit',compact('task'));
    }

    public function update(TaskValidationRequest $request, $id)
    {
        $task=Task::find($id);
        if($task==null){
            return redirect()->route('task.index')->with("error","Registro no encontrado");
        }
        $task->update($request->all());
        return redirect()->route('task.index')->with("success","Registro modificado");
    }

    public function destroy($id)
    {  
        $task=Task::find($id);
        if($task == null){
            return redirecti()->route('task.index')->with("error","No se encontró el registro");
        }
        $task->delete();
        return redirect()->route('task.index')->with("success","Registro eliminado");
    }
}
