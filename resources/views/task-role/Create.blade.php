@extends('layouts.masterpage')

@section('title','Nueva asignación')

@section('main')
    <div class="row">
        <div class="col-6 mx-auto">
            <form class="row" action="{{route('task-role.store')}}" method="post">
            @csrf
            <label>Tarea</label>
                <select name="task_id" class="form-control">
                    @foreach ($tasks as $task)
                        <option value="{{$task->id}}">{{$task->name}}</option>
                    @endforeach
                </select>
                @error('task_id')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <label>Responsable</label>
                <select name="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name ." ". $user->last_name}}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="submit" value="Asignar" class="btn btn-primary mt-2"/>
                <a href="{{route('task-role.index')}}" class="btn btn-cancel">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
