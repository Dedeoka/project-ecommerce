@extends('layouts.user.auth')

@section('content')
<div class="container">
    <div class="register-heading">
        <h3>Registrasi Sekarang!</h3>
    </div>
    <div class="register-form">
        <form method="POST" action="{{ route('register') }}">
        @csrf
            <div class="row mb-3">
                <div class="">
                <input id="name" type="text" class="form-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="">
                <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="">
                <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Kata Sandi">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="">
                    <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Kata Sandi">
                </div>
            </div>
            <div class="btn-submit">
                <button type="submit" class="btn-register">
                    <p>Buat Akun</p>
                </button>
            </div>
            <div class="login-link">
                <p>Sudah Memiliki Akun? <a href="/register">Masuk</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
