@extends('layouts.masterpage')

@section('title','Home')

@section('main')
    <div class="row">
        <h3 class="text-center">Bienvenido</h3>
        <div class="col-8 mx-auto">
            <p>
                Bienvenido a la página de gestión de tareas.
                Esta plataforma permite crear un conjunto de tareas y asignarlo a los usuarios
                que deben llevarlo a cabo.
                <br /><br />
                <b>En esta aplicación web puedes:</b>
                <ul>
                    <li>Gestionar tareas</li>
                    <li>Gestionar usuarios</li>
                    <li>Asignar tareas a usuarios</li>
                </ul>
                @auth
                <b>!Comienza a generar tus tareas!</b>
                @else
                Para poder comenzar necesitas <a href="{{route('login')}}">Iniciar sesión</a>
                
                @endauth
            </p>
        </div>
    </div>

@endsection