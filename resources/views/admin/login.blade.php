@extends('layouts.admin.auth')

@section('content')
<div class="login-card">
    <div class="login-heading">
        <h3>Login Admin!</h3>
    </div>
    <div class="login-form">
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-warning">{{ $error }}</div>
            @endforeach
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <form method="POST" action="{{ route('actionlogin') }}">
            @csrf
            <div class="row mb-3">
                <div class="email-form">
                    <input placeholder="Email" type="email" id="username" class="form-input" name="username" id="username" required/>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="password-form">
                    <input placeholder="password" type="password" class="form-input"  name="password" id="password" required/>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="btn-submit">
                <button type="submit" class="btn-login">
                    <p>Masuk</p>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
