@extends('layouts.masterpage')

@section('title','Tareas')

@section('main')
<div class="row">
        <div class="col-12">
            <h3 class="text-center">Lista de tareas</h3>
        </div>
        <div class="col-12 mt-2 mb-2">
            <a href="{{route('task.create')}}" class="btn btn-primary">Registrar nueva tarea</a>
        </div>
        <div class="col-12">
            @if($tasks->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tarea</th>
                            <th>Descripción</th>
                            <th>Entrega</th>
                            <th>Comentarios</th>
                            <th colspan="2" class="text-center">Aciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->id}}</td>
                                <td>{{$task->name}}</td>
                                <td>{{$task->description}}</td>
                                <td>{{$task->deadline}}</td>
                                <td>{{$task->comments}}</td>
                                <td>
                                    <a href="{{route('task.edit',['task'=>$task->id])}}">Modificar</a>
                                </td>
                                <td>
                                    <form action="{{route('task.destroy',['task'=>$task->id])}}" method="post" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Eliminar">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-danger">
                    <p>No hay registro</p>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
    @if($tasks->isNotEmpty())
        <script type="text/javascript">
            const deleteForms=document.querySelectorAll('.delete-form');
            deleteForms.forEach((deleteForm)=>{
                deleteForm.addEventListener('submit',(event)=>{
                    event.preventDefault();
                    Swal.fire({
                        title:'Eliminar',
                        icon:'warning',
                        text:"¿Estas seguro de eliminar este registro?",
                        showCancelButton:true,
                        confirmButtonText:'Sí, eliminar'
                    }).then((response)=>{
                        if(response.isConfirmed){
                            deleteForm.submit();
                        }
                    });
                });
            });
        </script>
    @endif

    @include('layouts.callback-messages')
@endsection