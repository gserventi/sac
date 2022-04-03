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
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                @csrf

                    <div class="form-group">
                        <label for="email">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="au-btn au-btn--block au-btn--blue m-b-20">
                        {{ __('Send Password Reset Link') }}
                    </button>

                </form>

            </div>
        </div>
    </div>
@endsection
