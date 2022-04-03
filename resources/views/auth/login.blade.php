@extends('layouts.app')

@section('content')
<div class="login-wrap">
    <div class="login-content">

        <div class="login-logo">
            <a href="{{ url('/home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Transporte TDM" style="height: 56px"/>
                <strong class="text-primary">SAC</strong>
            </a>
        </div>

        <div class="login-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="username">Nombre de usuario</label>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="login-checkbox">
                    <label>
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        {{ __('Remember Me') }}
                    </label>
                    {{--<label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </label>--}}
                </div>
                <button type="submit" class="au-btn au-btn--block au-btn--blue m-b-20">
                    {{ __('Login') }}
                </button>
            </form>

            {{--<div class="register-link">
                <p>No tiene cuenta?
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                </p>
            </div>--}}

        </div>

    </div>
</div>
@endsection
