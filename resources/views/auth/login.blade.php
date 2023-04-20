@extends('layouts.app')

@section('content')

<div class="login-card">
    <div class="login-heading">
        <h3>Selamat Datang!</h3>
    </div>
    <div class="login-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row mb-3">
                <div class="email-form">
                    <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Username/E-mail" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="password-form">
                    <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Kata Sandi">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            {{ __('Lupa Kata Sandi?') }}
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="btn-submit">
                <button type="submit" class="btn-login">
                    <p>Masuk</p>
                </button>
            </div>
            <div class="register-link">
                <p>Belum Mendaftar? <a href="/register">Buat Akun</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
