@extends('layouts.app')
@section('title')
    | Detalles del visitante
@endsection
@section('content')
    <h1 class="text-center">
        <a class="float-start" title="Volver" href="{{ route('home') }}">
            <i class="bi bi-arrow-left-circle"></i>
        </a>
        Datos del visitante
        <hr>
    </h1>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"> Nombre: &nbsp; &nbsp; <strong> {{ $registro->nombre }}</strong></li>
        <li class="list-group-item"> Edad: &nbsp; &nbsp; <strong> {{ $registro->edad }}</strong></li>
        <li class="list-group-item"> Cédula: &nbsp; &nbsp; <strong> {{ $registro->cedula }}</strong></li>
        <li class="list-group-item"> Teléfono: &nbsp; &nbsp; <strong> {{ $registro->telefono }}</strong></li>
        <li class="list-group-item"> Imagen: &nbsp; &nbsp; <br>
            <img src="{{ asset('images/' . $registro->imagen) }}" alt="Imagen" width="150" height="150" />
        </li>
    </ul>
@endsection
