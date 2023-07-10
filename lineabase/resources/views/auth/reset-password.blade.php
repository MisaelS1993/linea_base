@extends('layouts.guest')

@section('form')

<div class="text-center mb-1 mt-1">
    <img src="{{ asset('assets/images/favicon.ico') }}" height="80" class='mb-4'>
    <h3>Iniciar Sesión</h3>
    <p>Inicia sesión para continuar...</p>
</div>
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
        
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
        
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
            </div>
        
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
            </div>
        
            <div class="form-group">
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>
        
            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
            </div>
        </form>
        
@endsection