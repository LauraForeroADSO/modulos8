@extends('layouts.app')
@section('title')
    | Editar visitante
@endsection

@section('content')
    <h1 class="text-center">
        <a class="float-start" title="Volver" href="{{ route('home') }}">
            <i class="bi bi-arrow-left-circle"></i>
        </a>
        Editar datos del visitante
        <hr>
    </h1>

    <form action="{{ route('myUpdate', $registro->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required value="{{ $registro->nombre }}" />
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Cédula (NIT)</label>
                <input type="text" name="cedula" class="form-control" required value="{{ $registro->cedula }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Seleccione la edad</label>
                <select class="form-select" name="edad" required>
                    <option value="">Edad</option>
                    @for ($i = 18; $i <= 50; $i++)
                        <option value="{{ $i }}" {{ $i == $registro->edad ? 'selected' : '' }}>
                            {{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Sexo</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="sexo_m" value="Masculino"
                        {{ $registro->sexo == 'Masculino' ? 'checked' : '' }}>
                    <label class="form-check-label" for="sexo_m">
                        Masculino
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="sexo_f" value="Femenino"
                        {{ $registro->sexo == 'Femenino' ? 'checked' : '' }}>
                    <label class="form-check-label" for="sexo_f">
                        Femenino
                    </label>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6 mb-3">
                <label class="form-label">Teléfono</label>
                <input type="number" name="telefono" class="form-control" required value="{{ $registro->telefono }}" />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6 mb-3 mt-3">
                <label class="form-label">Foto actual del visitante</label>
                @if ($registro->imagen)
                    <img src="{{ asset('images/' . $registro->imagen) }}" alt="Imagen" width="50" height="50" />
                @else
                    <img src="https://www.drmarket.com.mx/Archivos/Anuncios/sinImagenDefault.jpg" alt="Imagen"
                        width="50" height="50" />
                @endif
            </div>
            <div class="col-md-6 mb-3 mt-3">
                <label class="form-label">Cambiar Foto del visitante</label>
                <input class="form-control form-control-sm" type="file" name="imagen" accept="image/png, image/jpeg" />
            </div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn_add">
                Actualizar datos del visitante
            </button>
        </div>
    </form>
@endsection
