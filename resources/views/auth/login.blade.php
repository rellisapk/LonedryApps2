@extends('layouts.app')

@section('css')
body {
    background: url(https://images.unsplash.com/photo-1576109135919-aa9bf1e6a975?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card" style="margin-top: 50px;">
                <div class="card-body">
                    <h2 class="card-title">{{ __('Log In') }}</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row my-3">
                            <div class="col">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col">
                                <button type="submit" class="btn btn-main">
                                    {{ __('Masuk') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-second" href="{{ route('password.request') }}">
                                        {{ __('Lupa password?') }}
                                    </a>
                                @endif

                                <a class="btn btn-light" href="{{ route('register') }}" role="button">{{ __('Buat akun baru') }}</a>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
