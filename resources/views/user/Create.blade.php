@extends('layouts.masterpage')

@section('title',"Registrar usuario")

@section('main')
    @if($roles->isNotEmpty())
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form class="row p-3" action="{{route('user.store')}}" method="post">
                    @csrf
                    <h3 class="text-center mt-2 mb-2">Registrar usuario</h3>
                    <label>Rol</label>
                    <select class="" name="rol_id">
                        @foreach ($roles as $rol)
                        <option value="{{$rol->id}}">{{$rol->name}}</option>
                        @endforeach
                    </select>
                    @error('rol_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <label>Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}"/>
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <label>Apellidos</label>
                    <input type="text" name="last_name" class="form-control" value="{{old('last_name')}}"/>
                    <label>Correo electrónico</label>
                    <input type="text" name="email" class="form-control" value="{{old('email')}}"/>
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control" />
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <label>Confirmar contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control" />
                    @error('password_confirmation')
                        <span class="text-danger">{{$message}}</    span>
                    @enderror
                    <input type="submit" value="Registrar" class="btn btn-primary">
                    <a href="{{route('user.index')}}" class="btn btn-cancel">Cancelar</a>
                </form>
            </div>
        </div>
    @else
        <div class="alert alert-danger">
            <p>No hay roles creados. Crea un rol para poder crear usuarios</p>
        </div>
    @endif
@endsection
