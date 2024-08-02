@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <i class="fas fa-user form-icon"></i>

        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

    </div>
    <div class="form-group">
        <i class="fas fa-lock form-icon"></i>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group remember-forgot">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="rememberMe"> {{ __('Remember Me') }}</label>
        </div>
        <!-- <a href="#" class="text-primary">Forgot Password?</a> -->
        @if (Route::has('password.request'))
        <a class="text-primary" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif
    </div>
    <!-- <button type="submit" class="btn btn-primary btn-block">Login</button> -->
    <button type="submit" class="btn btn-primary btn-block">
        {{ __('Login') }}
    </button>
</form>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection