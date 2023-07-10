@extends('layouts.guest')

@section('form')
    <div class="text-center mb-1 mt-1">
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
            <label for="email">Nombre de Usuario</label>
            <div class="position-relative">
                <div class="form-control-icon">
                    <i data-feather="user"></i>
                </div>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}"
                    required autofocus autocomplete="email">
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
                <div class="form-control-icon">
                    <i data-feather="lock"></i>
                </div>
                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="current-password">
            </div>
        </div>

        <div class='form-check clearfix my-4'>
            <div class="checkbox float-left">
                <input type="checkbox" id="checkbox1" class='form-check-input'>
                <label for="checkbox1">Recuérdame</label>
            </div>
            <div class="float-right">

            </div>
        </div>
        <div class="clearfix">
            <button class="btn btn-primary float-right">Enviar</button>
        </div>
    </form>
    <div class="divider">
        <div class="divider-text">Contáctanos</div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <a href="http://www.consejohiguito.hn/" class="btn btn-block mb-2 btn-secondary">
                Consejo Intermunicipal Higuito</a>
        </div>
    </div>
@endsection
