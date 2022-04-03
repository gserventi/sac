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
                <form method="POST" action="{{ route('register') }}">
                @csrf

                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="username">Usuario</label>
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <button type="submit" class="au-btn au-btn--block au-btn--blue m-b-20">
                        {{ __('Register') }}
                    </button>

                </form>

                <div class="register-link">
                    <p>{{ __('Already registered?') }}
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </p>
                </div>

            </div>

        </div>
    </div>

@endsection
