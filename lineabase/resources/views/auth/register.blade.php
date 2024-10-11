@extends('layouts.guest') 

@section('form')
    <div class="text-center mb-1 mt-1">
        <img src="{{ asset('assets/images/favicon.ico') }}" height="80" class='mb-4'>
        <h3>Registro</h3>
        <p>Crea una nueva cuenta para continuar...</p>
    </div>

    <div class="text-center text-danger mb-2 mt-1">
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group position-relative has-icon-left">
            <label for="name">Nombre</label>
            <div class="position-relative">
                <div class="form-control-icon">
                    <i data-feather="user"></i>
                </div>
                <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
            </div>
        </div>

        <div class="form-group position-relative has-icon-left">
            <label for="email">Email</label>
            <div class="position-relative">
                <div class="form-control-icon">
                    <i data-feather="mail"></i>
                </div>
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username">
            </div>
        </div>

        <div class="form-group position-relative has-icon-left">
            <label for="password">Contraseña</label>
            <div class="position-relative">
                <div class="form-control-icon">
                    <i data-feather="lock"></i>
                </div>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group position-relative has-icon-left">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <div class="position-relative">
                <div class="form-control-icon">
                    <i data-feather="lock"></i>
                </div>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-label for="terms">
                    <div class="flex items-center">
                        <x-checkbox name="terms" id="terms" required />

                        <div class="ml-2">
                            {!! __('Acepto los :terms_of_service y la :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Términos de Servicio').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Política de Privacidad').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-label>
            </div>
        @endif

        <div class="clearfix">
            <button class="btn btn-primary float-right">Registrar</button>
        </div>
    </form>

    <div class="text-center mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
            {{ __('¿Ya tienes una cuenta?') }}
        </a>
    </div>

    <div class="divider mt-4">
        <div class="divider-text">Contáctanos</div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <a href="http://www.consejohiguito.hn/" class="btn btn-block mb-2 btn-secondary">
                Consejo Intermunicipal Higuito</a>
        </div>
    </div>
@endsection
