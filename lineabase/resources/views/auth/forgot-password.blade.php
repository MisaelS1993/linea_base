@extends('layouts.guest')

@section('form')

    <div class="text-center mb-1 mt-1">
        <img src="{{ asset('assets/images/favicon.ico') }}" height="80" class='mb-4'>
        <h3>Iniciar Sesión</h3>
        <p>¿Olvidaste tu contraseña? Ningún problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace de restablecimiento de contraseña que le permitirá elegir una nueva.</p>
    </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
        
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            </div>
        
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Restablecimiento de Contraseña</button>
            </div>
        </form>
        
@endsection
