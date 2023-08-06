@extends('layouts.masterpage')

@section('title','Iniciar sesión')

@section('main')
    <div class="row">
        <div class="col-4 mx-auto">
            <form class="row" action="{{route('login')}}" method="post">
                @csrf
                <div><h3 class="text-center">Iniciar sesión</h3></div>
                @error('credentials')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{old('email')}}"/>
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" />
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="submit" class="btn btn-primary mt-2">
            </form>
        </di> 
    </div>
@endsection