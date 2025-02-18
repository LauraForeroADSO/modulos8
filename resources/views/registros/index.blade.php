<div class="table-responsive">
    <table class="table table-hover" id="table_registros">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Edad</th>
                <th scope="col">Cédula</th>
                <th scope="col">Imagen</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registros as $registro)
                <tr id="registro_{{ $registro->id }}">
                    <td>{{ $registro->id }}</td>
                    <td>{{ $registro->nombre }}</td>
                    <td>{{ $registro->edad }}</td>
                    <td>{{ $registro->cedula }}</td>
                    <td>
                        @if ($registro->imagen)
                            <!--
                        El helper asset generará la URL completa a la carpeta de imagenes, asegurando que las imágenes se carguen correctamente independientemente de la ruta en la que te encuentres dentro de tu aplicación Laravel.
                        -->
                            <img src="{{ asset('images/' . $registro->imagen) }}" alt="Imagen" width="50"
                                height="50" />
                        @else
                            <img src="https://www.drmarket.com.mx/Archivos/Anuncios/sinImagenDefault.jpg" alt="imagen"
                                width="50" height="50" />
                        @endif
                    </td>
                    <td>
                        <ul class="flex_acciones">
                            <li>
                                <a title="Ver detalles del visitante" href="{{ route('myShow', $registro->id) }}"
                                    class="btn btn-success"><i class="bi bi-binoculars"></i></a>
                            </li>
                            <li>
                                <a href="{{ route('myEdit', $registro->id) }}" class="btn btn-primary"><i
                                        class="bi bi-pencil-square"></i></a>
                            </li>
                            <li>
                                <form action="{{ route('myDestroy', $registro->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('¿Desea eliminar este registro?');"><i
                                            class="bi bi-trash"></i> </button>
                                </form>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
