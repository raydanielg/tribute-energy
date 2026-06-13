@extends('layouts.auth')

@section('form-header')
    <div class="flex justify-center mb-8">
        <img src="{{ asset('logo.png') }}" alt="Tribute Energy Logo" class="h-8 w-auto">
    </div>
    <h2 class="auth-form-title">Welcome back</h2>
    <p class="auth-form-subtitle">Sign in to your Tribute Energy account to continue.</p>
@endsection

@section('form-content')
    <form method="POST" action="{{ route('login') }}" id="loginForm">
        @csrf

        @if (session('status'))
            <div class="alert alert-success animate__animated animate__fadeInDown">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->has('email') && $errors->first('email') === 'These credentials do not match our records.')
            <div class="alert alert-danger animate__animated animate__shakeX">
                <svg style="width:16px;height:16px;vertical-align:middle;margin-right:6px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ $errors->first('email') }}
            </div>
        @endif

        <div class="form-group" data-aos="fade-up" data-aos-delay="100">
            <label for="email" class="form-label">Email address</label>
            <div class="input-wrapper">
                <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@company.com">
            </div>
            @error('email')
                @if($message !== 'These credentials do not match our records.')
                    <div class="invalid-feedback animate__animated animate__fadeIn">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        {{ $message }}
                    </div>
                @endif
            @enderror
        </div>

        <div class="form-group" data-aos="fade-up" data-aos-delay="200">
            <label for="password" class="form-label">Password</label>
            <div class="input-wrapper">
                <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">
            </div>
            @error('password')
                <div class="invalid-feedback animate__animated animate__fadeIn">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group" data-aos="fade-up" data-aos-delay="300">
            <label class="form-check">
                <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <span class="form-check-label">Remember me</span>
            </label>
        </div>

        <button type="submit" class="btn btn-primary btn-block animate__animated animate__pulse" data-aos="fade-up" data-aos-delay="400">
            <span class="btn-text">Sign in</span>
        </button>

        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="btn-link" style="display: block; text-align: center; margin-top: 1rem;" data-aos="fade-up" data-aos-delay="500">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </form>

    <div class="auth-footer" data-aos="fade-up" data-aos-delay="600">
        <span>Don't have an account?</span>
        <a href="{{ route('register') }}" class="auth-footer-link">Create account</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('loginForm');
            loginForm.addEventListener('submit', function(e) {
                const btn = this.querySelector('.btn-primary');
                const btnText = btn.querySelector('.btn-text');
                btn.classList.add('loading');
                btnText.textContent = 'Signing in...';
            });
        });
    </script>
@endsection
