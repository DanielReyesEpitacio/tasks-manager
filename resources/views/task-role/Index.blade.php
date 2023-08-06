@extends('layouts.masterpage')

@section('title','Rol de tareas')

@section('main')
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">Rol de tareas</h3>
        </div>
        <div class="col-12">
            <a href="{{route('task-role.create')}}" class="btn btn-primary">Asignar tarea</a>
        </div>
        <div class="col-12 mt-2">
            @if ($tasks_role->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>Clave tarea</th>
                            <th>Clave responsable</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks_role as $task_rol)
                            <tr>
                                <td>{{$task_rol->task_id}}</td>
                                <td>{{$task_rol->user_id}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <div class="alert alert-danger">
                <p>No hay rol de tareas</p>
            </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
    @include('layouts.callback-messages')
@endsection