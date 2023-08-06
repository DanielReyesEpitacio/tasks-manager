@extends('layouts.masterpage')

@section('title','Editar rol')

@section('main')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form class="row p-3" action="{{route('roles.update', 'role'=>$rol->id)}}" method="post">
                @csrf
                @method('PUT')
                <h3 class="text-center mt-2 mb-2">Crea un nuevo rol</h3>
                <label class="">Rol</label>
                <input type="text" class="form-control" name="name" value="{{$rol->name}}">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <label>Descripción</label>
                <textarea rows="4" class="form-control" name="description">{{$rol->description}}</textarea>
                <input type="submit" value="Actualizar"class="btn btn-primary mt-3">
                <a href="{{route('roles.index')}}" class="btn btn-cancel">Cancelar</a>
            </form>
        </div>
    </div>
@endsection