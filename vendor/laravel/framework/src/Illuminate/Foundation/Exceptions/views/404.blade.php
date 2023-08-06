@extends('layouts.masterpage')
@section('main')
    <div class="container d-flex align-items-center justify-content-center" style="height:50vh;">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">404 - Página no encontrada</h1>
            </div>
            <div class="col-12 text-center">
                <a href="{{route('home')}}" class="btn btn-primary">Ir al inicio</a>
            </div>
        </div>

    </div>
@endsection