@extends('layouts.guest')

@section('form')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <img src="{{ asset('assets/images/favicon.ico') }}" height="80" class='mb-4'>
                        <h3>Iniciar Sesión</h3>
                        <p>Inicia sesión para continuar...</p>
                    </div>
                    <div class="text-center text-danger mb-2 mt-1">
                        <x-validation-errors class="mb-4" />

                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif
                    </div>
                    <form form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left">
                            <label for="username">Correo Electrónico</label>
                            <div class="position-relative">
                                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" autofocus autocomplete="email">
                                <div class="form-control-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left">
                            <div class="clearfix">
                                <label for="password">Contraseña</label>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class='float-right'>
                                    <small>¿Olvidó su contraseña?</small>
                                </a>
                                @endif

                            </div>
                            <div class="position-relative">
                                <input id="password" class="form-control" type="password" name="password" autocomplete="current-password">
                                <div class="form-control-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div class='form-check clearfix my-4'>
                            <div class="checkbox float-left">
                                <input type="checkbox" id="checkbox1" class='form-check-input'>
                                <label for="checkbox1">Recuérdame</label>
                            </div>
                        </div>
                        <div class="clearfix">
                            <button class="btn btn-primary float-right">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection