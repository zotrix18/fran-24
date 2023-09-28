<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Visual Market') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('build/assets/css/app-041e359a.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/assets/css/styles.css') }}">
    <script src="{{ URL::asset('build/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/mijs.js') }}"></script>
    <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->apellido }}, {{ Auth::user()->nombre }}
    </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Salir') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div> -->
</head>
<body class="sinDesp">
    <div class="conteiner-fluid">
        <div class="row">
            <div class="col-9 ">

            </div>
            <div class="col-3 colroja conteiner-fluid mx-0 px-0">
                <div class="row ">
                    <div class="col-6 pe-0">
                        <div class="fecha">
                            <p id="dia-semana">{{ $diaSemana }}</p>
                        </div>
                        
                    </div>
                    <div class="col-6 px-0 ">
                       <div class="reloj">
                        <p id="hora-actual">{{ $horaActual->format('H:i') }}</p>
                        </div>
                    </div>
                </div>
            
                </div>
            </div>

        </div>

    </div>


    
        
</body>
</html>