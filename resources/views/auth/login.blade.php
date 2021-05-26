@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="section-title pb-3">
                El Podcast, Iniciar Sesión
            </div>
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Correo Electrónico</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group d-flex justify-content-between">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Recuerdame') }}
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>

                <div class="form-group mb-0">
                    <button type="submit" class="btn-fill" style="width: 100%">
                        Inicar Sesión
                    </button>
                </div>

                <div class="d-flex justify-content-center pt-3">
                    <a class="btn btn-link" href="{{ route('register') }}">
                        ¿No tienes una cuenta? Registrate
                    </a>
                </div>
            </form>
        </div>
        <div class="col-4" >
            <img src="https://simplecast.com/assets/images/home-cta-main.png"
             class="feature-image"
             style="min-width: 100%">
        </div>

    </div>
</div>
@endsection
