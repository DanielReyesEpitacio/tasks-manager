@extends('layouts.masterpage')
@section('title','Usuarios')

@section('main')
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">Usuarios</h3>
        </div>
        <div class="col-12 mt-2 mb-2">
            <a href="{{route('user.create')}}" class="btn btn-primary">Registrar nuevo usuario</a>
        </div>
        <div class="col-12">
            @if($users->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Rol</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th colspan="2" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->rol->name}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td><a href="{{route('user.edit',['user'=>$user->id])}}">Modificar</a></td>
                            <td>
                                <form action="{{route('user.destroy',['user'=>$user->id])}}" method="post" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Eliminar" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-danger">
                <p>No hay registros</p>
            </div>
            @endif
        </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript">
        const deleteForms=document.querySelectorAll('.delete-form');
        deleteForms.forEach((deleteForm)=>{
            deleteForm.addEventListener('submit',(event)=>{
                event.preventDefault();
                Swal.fire({
                    title:"Eliminar",
                    icon:"warning",
                    text:"¿Estas seguro de eliminar este registro?",
                    showCancelButton:true,
                    confirmButtonText:"Si, eliminar"
                }).then((response)=>{
                    if(response.isConfirmed){
                        deleteForm.submit();
                    }
                });
            });
        });
    </script>

    @include('layouts.callback-messages')
@endsection