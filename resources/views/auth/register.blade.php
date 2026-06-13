@extends('layouts.auth')

@section('form-header')
    <div class="flex justify-center mb-6">
        <img src="{{ asset('logo.png') }}" alt="Tribute Energy Logo" class="h-24 w-auto opacity-90">
    </div>
    <h2 class="auth-form-title">Create your account</h2>
    <p class="auth-form-subtitle">Join Tribute Energy and start managing your energy solutions today.</p>
@endsection

@section('form-content')
    <form method="POST" action="{{ route('register') }}" id="registerForm">
        @csrf

        <div class="form-group" data-aos="fade-up" data-aos-delay="100">
            <label for="name" class="form-label">Full Name</label>
            <div class="input-wrapper">
                <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="John Doe">
            </div>
            @error('name')
                <div class="invalid-feedback animate__animated animate__fadeIn">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group" data-aos="fade-up" data-aos-delay="200">
            <label for="email" class="form-label">Email address</label>
            <div class="input-wrapper">
                <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@company.com">
            </div>
            @error('email')
                <div class="invalid-feedback animate__animated animate__fadeIn">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group" data-aos="fade-up" data-aos-delay="300">
            <label for="password" class="form-label">Password</label>
            <div class="input-wrapper">
                <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="••••••••">
            </div>
            @error('password')
                <div class="invalid-feedback animate__animated animate__fadeIn">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group" data-aos="fade-up" data-aos-delay="400">
            <label for="password-confirm" class="form-label">Confirm Password</label>
            <div class="input-wrapper">
                <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block animate__animated animate__pulse" data-aos="fade-up" data-aos-delay="500">
            <span class="btn-text">Create account</span>
        </button>
    </form>

    <div class="auth-footer" data-aos="fade-up" data-aos-delay="600">
        <span>Already have an account?</span>
        <a href="{{ route('login') }}" class="auth-footer-link">Sign in</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const registerForm = document.getElementById('registerForm');
            registerForm.addEventListener('submit', function(e) {
                const btn = this.querySelector('.btn-primary');
                const btnText = btn.querySelector('.btn-text');
                btn.classList.add('loading');
                btnText.textContent = 'Creating account...';
            });
        });
    </script>
@endsection
