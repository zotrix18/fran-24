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

   

   


</head>
<body class="sinDesp">
    
 <div class="conteiner-fluid">

    <div class="row">
        <div class="col-lg-3 gradiente-login">
            <div class="text-center my-5">
                <img src="{{ URL::asset('build/assets/img/logo.png')}}" 
                class="w-50"
                alt="logo">
            </div>
            <div class="text-fran">
                <p>Fran 24 Hs</p>
            </div>
            
        </div>

        <div class="col-lg-3"></div>

        <div class="col-lg-3 centro shadow-lg p-3 mb-5 bg-white rounded">
            <p class="text-login text-center">Login</p>
                <div class="mt-3 p-5">

                

                
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end"></label>
                                <input id="username" type="text" class="form-control input-no-bg text-center border-0 @error('username') is-invalid @enderror" placeholder="Usuario" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                <div class="linea"></div>
                                @error('username')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ __('Usuario o Contraseña incorrectos') }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end"></label>                           
                                <input id="password" type="password" class="form-control input-no-bg text-center border-0 @error('password') is-invalid @enderror" placeholder="Contraseña" name="password" required autocomplete="current-password">
                                <div class="linea"></div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row mb-0">
                            <div class="col-md-15 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Iniciar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            
        </div>

        <div class="col-lg-3"></div>

    </div>

 </div>


</body>
</html>