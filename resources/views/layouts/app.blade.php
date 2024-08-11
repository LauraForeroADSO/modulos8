<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegisVis @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('imgs/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">


        <a href="#" class="navbar-brand"> <span class="text-primary">Regis</span>Vis</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarS"
            aria-controls="navbarS" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <label for="" class="brand">
            <a href=""><img src="images/Registro_Logo.png" alt="Imagen" width="50"></a>
        </label>
        <div class="collapse navbar-collapse" id="navbarS">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('nosotros') }}" class="nav-link">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('servicios') }}" class="nav-link">Servicios</a>
                </li>

            </ul>

        </div>
        </div>
    </nav>
    <div id="carouselE" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselE" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselE" data-bs-slide-to="1" aria-current="true"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselE" data-bs-slide-to="2" aria-current="true"
                aria-label="Slide 3"></button>

        </div>

        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="images/home-1.jpg" class="d-block w-100" alt="">
                <div class="carousel-caption">
                    <h5>Gestión de visitantes</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Nisi hic, nobis modi consequatur officiis laboriosam ipsam voluptatibus?
                        Reiciendis tenetur excepturi ipsa eaque quidem voluptatum, consequatur
                        accusamus ipsam, officiis id perspiciatis.
                    </p>
                    <a href="#" class="btn btn-primary mt-3">Más información</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/home-2.jpg" class="d-block w-100" alt="">
                <div class="carousel-caption">
                    <h5>Sistemas de registro</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Nisi hic, nobis modi consequatur officiis laboriosam ipsam voluptatibus?
                        Reiciendis tenetur excepturi ipsa eaque quidem voluptatum, consequatur
                        accusamus ipsam, officiis id perspiciatis.
                    </p>
                    <a href="#" class="btn btn-primary mt-3">Más información</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/home-3.jpg" class="d-block w-100" alt="">
                <div class="carousel-caption">
                    <h5>Bases de datos y ciberseguridad</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Nisi hic, nobis modi consequatur officiis laboriosam ipsam voluptatibus?
                        Reiciendis tenetur excepturi ipsa eaque quidem voluptatum, consequatur
                        accusamus ipsam, officiis id perspiciatis.
                    </p>
                    <a href="#" class="btn btn-primary mt-3">Más información</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselE" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselE" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <br>
    <h1 class="text-center mt-5 mb-5 fw-bold">RegisVis <span style="color: rgb(4, 71, 31)"> Registro de visitantes
        </span>
        <img src="{{ asset('images/Registro_Logo.png') }}" alt="Imagen" width="150">
    </h1>

    <div class="container">
        @include('messages')

        <div class="row justify-content-md-center">
            <div class="col-md-4" style="border-right: 1px solid #dee2e6;">
                <h1 class="text-center">Registrar visitante
                    <hr>
                </h1>
                @include('registros.add')
            </div>


            <div class="col-md-8">
                {{-- Si no hay contenido en la sección 'content', se incluirá la lista de registros por defecto --}}
                @if (empty(trim($__env->yieldContent('content'))))
                    <h1 class="text-center">Lista de registros
                        <hr>
                    </h1>
                    @include('registros.index')
                @else
                    @yield('content')
                @endif

            </div>
        </div>
    </div>
    <br>
    <footer class="bg-dark p-2 text-center">
        <div class="text">
            <p class="text-white">Registro de visitantes</p>
            <p class="socials">
                <i class="bi bi-x text-white mx-1"></i>
                <i class="bi bi-facebook text-white mx-1"></i>
                <i class="bi bi-linkedin text-white mx-1"></i>
                <i class="bi bi-instagram text-white mx-1"></i>
            </p>
        </div>

    </footer>
    <br>
</body>


</html>
