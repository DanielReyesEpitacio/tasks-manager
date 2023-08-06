@extends('layouts.masterpage')

@section('title','Crear tarea')

@section('main')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form class="row p-3" action="{{route('task.store')}}" method="post">
                @csrf
                <h3 class="text-center mt-2 mb-2">Crear nueva tarea</h3>
                <label>Tarea</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}"/>
                @error('name')
                    <label class="text-danger">{{$message}}</label>
                @enderror
                <label>Descripción</label>
                <textarea rows="4" name="description" class="form-control">{{old('description')}}</textarea>
                @error('description')
                    <label class="text-danger">{{$message}}</label>
                @enderror
                <label>Fecha límite</label>
                <input type="date" name="deadline" class="form-control" value="{{old('deadline')}}"/>
                @error('deadline')
                    <label class="text-danger">{{$message}}</label>
                @enderror
                <label>Comentario</label>
                <input type="text" name="comments" class="form-control" value="{{old('comments')}}"/>
                @error('comments')
                    <label class="text-danger">{{$message}}</label>
                @enderror
                <input type="submit" value="Guardar"class="btn btn-primary mt-3">
                <a href="{{route('task.index')}}" class="btn btn-cancel">Cancelar</a>
            </form>
        </div>
    </div>
@endsection