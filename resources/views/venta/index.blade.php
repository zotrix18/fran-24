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
                <div class="conteiner">
                    <div class="row">
                        <div class="col-6">
                            <div>
                                <img src="{{ URL::asset('build/assets/img/logo_transparent-black.png')}}" 
                                width="20%"
                                class="align-items-start mt-1 mx-1 text-dark"
                                alt="logo">
                            </div>

                            <p class="mx-4">Emitir factura a:</p>
                            <p><img src="{{ URL::asset('build/assets/svg/user.svg')}}" 
                                alt="svg-user"
                                width="3%"
                                class="mx-2"
                                > 2 / Eventual</p>
                            
                            <p><img src="{{ URL::asset('build/assets/svg/briefcase.svg')}}" 
                                alt="svg-user"
                                width="3%"
                                class="mx-2"
                                > CUIT: 20111111112 / Eventual</p>
                            
                            <p><img src="{{ URL::asset('build/assets/svg/house.svg')}}" 
                                alt="svg-user"
                                width="3%"
                                class="mx-2"
                                > AV. Independencia 3504 / Corrientes</p>
                        </div>

                        <div class="col-6">
                            
                            <p class="text-end me-fran">FRAN 24 Horas</p>
                            <p class="text-center">Sucursal 1 - Puesto 1</p>
                            
                                
                            <div class="form-group text-center ">
                                <img src="{{ URL::asset('build/assets/svg/building-columns.svg')}}" 
                                    alt="bank"
                                    width="3%"
                                    >
                                <label for="metodo-pago"></label>
                                <select id="metodo-pago" class="form-control-sm" name="metodo-pago">
                                    <option value ="">Seleccione Metodo de Pago</option>
                                    <option value ="1">Efectivo</option>
                                    <option value ="2">Mercado Pago</option>
                                    <option value ="3">Transferencia</option>
                                </select>
                            </div>
                            
                            

                        </div>
                    </div>
                </div>


                
                <div class="shadow-sm p-3 mb-5 bg-body-tertiary rounded ">
                    <input type="text" id="search-input" placeholder="Buscar">
                    <ul id="results-list"></ul>
                </div>
                
                <script>
                    
                </script>






            </div>
            <div class="col-3 colroja conteiner-fluid mx-0 px-0">
                <div class="row ">
                    <div class="col-6 pe-0 espaciador">
                        <div class="fecha text-center fs-2">
                            <p class="mb-0">{{ $fecha[0] }}</p>
                            <p class="mt-0">{{ $fecha[1] }}</p>
                        </div>
                        
                    </div>
                    <div class="col-6 px-0 espaciador">
                       <div class="reloj text-center">
                        <p id="hora-actual">{{ $horaActual->format('H:i') }}</p>
                        </div>
                    </div>
                </div>
            
                </div>
            </div>

        </div>

    </div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="{{ URL::asset('build/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('build/assets/js/mijs.js') }}"></script>       
</body>
</html>