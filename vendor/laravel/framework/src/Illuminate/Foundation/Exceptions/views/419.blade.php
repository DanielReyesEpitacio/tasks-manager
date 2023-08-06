@extends('layouts.masterpage')
@section('main')
    <div class="container d-flex align-items-center justify-content-center" style="height:50vh;">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-center">419 - La página expiró</h1>
                <span class="text-danger">Se te olvido poner el "CSRF" en la solictud del FORM</span>
            </div>
            <div class="col-12 text-center mt-2">
                <a href="{{url()->previous()}}" class="btn btn-primary">Regresar</a>
            </div>
        </div>

    </div>
@endsection
