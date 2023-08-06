@extends('layouts.masterpage')

@section('title','Lista de roles')

@section('main')
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">Roles</h3>
        </div>
        <div class="col-12">
            <a href="{{route('roles.create')}}" class="btn btn-primary">Crear nuevo rol</a>
        </div>
        <div class="col-12 mt-3">
            @if($roles->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Rol</th>
                        <th>Descripcion</th>
                        <th colspan="2" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $rol)
                        <tr>
                            <td>{{$rol->id}}</td>
                            <td>{{$rol->name}}</td>
                            <td>{{$rol->description}}</td>
                            <td><a href="{{route('roles.edit', ['role'=>$rol->id] )}}">Modificar</a></td>
                            <td>
                                <form action="{{route('roles.destroy',['role'=>$rol->id])}}" method="post" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Eliminar"class="btn btn-danger ">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-danger">
                <p>Aun no hay registros</p>
            <div>
            @endif
        </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript">
        const deleteForms=document.querySelectorAll('.delete-form');
        deleteForms.forEach(deleteForm=>{
            deleteForm.addEventListener('submit',(event)=>{
                event.preventDefault();
                Swal.fire({
                    title:'Eliminar',
                    text:'¿Estas seguro de eliminar este registro?',
                    icon:'warning',
                    showCancelButton:true,
                    confirmButtonText:'Sí, Eliminar'
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