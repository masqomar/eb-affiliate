@extends('layouts.auth')

@section('title', __('Reset Password'))

@section('content')

<div class="auth-left bg-main-50 flex-center p-24">
    <img src="{{ asset('assets') }}/images/thumbs/login.png" alt="Kampung Inggris Booster Meeting Room">
</div>
<div class="auth-right py-40 px-24 flex-center flex-column">
    <div class="auth-right__inner mx-auto w-100">
        <a href="index.html" class="auth-right__logo">
            <img src="{{ asset('assets') }}/images/logo/Kampung-inggris-booster-logo-landscape.png" alt="Kampung Inggris Booster Logo">
        </a>
        <h2 class="mb-8">Sign Up</h2>
        <p class="text-gray-600 text-15 mb-32">Please sign up to your account and start the adventure</p>

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible show fade">
            <ul class="ms-0 mb-0">
                @foreach ($errors->all() as $error)
                <li>
                    <p>{{ $error }}</p>
                </li>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ request()->token }}">

            <div class="mb-24">
                <label for="email" class="form-label mb-8 h6">Email </label>
                <div class="position-relative">
                    <input type="email" name="email" class="form-control py-11 ps-40  @error('email') is-invalid @enderror" id="email" placeholder="Email Aktif" value="{{ request()->email ?? old('email') }}" readonly required autocomplete="current-email">
                    <span class="position-absolute top-50 translate-middle-y ms-16 text-gray-600 d-flex"><i class="ph ph-envelope"></i></span>
                </div>
            </div>
            <div class="mb-24">
                <label for="current-password" class="form-label mb-8 h6">Password</label>
                <div class="position-relative">
                    <input type="password" name="password" class="form-control py-11 ps-40  @error('password') is-invalid @enderror" id="current-password" placeholder="Password">
                    <span class="toggle-password position-absolute top-50 inset-inline-end-0 me-16 translate-middle-y ph ph-eye-slash" id="#current-password"></span>
                    <span class="position-absolute top-50 translate-middle-y ms-16 text-gray-600 d-flex"><i class="ph ph-lock"></i></span>
                </div>
                <span class="text-gray-900 text-15 mt-4">Must be at least 8 characters</span>
            </div>
            <div class="mb-24">
                <label for="password-confirmation" class="form-label mb-8 h6">Konfirmasi Password</label>
                <div class="position-relative">
                    <input type="password" name="password_confirmation" class="form-control py-11 ps-40  @error('password_confirmation') is-invalid @enderror" id="password-confirmation" placeholder="Ketik ulang password">
                    <span class="toggle-password position-absolute top-50 inset-inline-end-0 me-16 translate-middle-y ph ph-eye-slash" id="#password-confirmation"></span>
                    <span class="position-absolute top-50 translate-middle-y ms-16 text-gray-600 d-flex"><i class="ph ph-lock"></i></span>
                </div>
            </div>

            <button type="submit" class="btn btn-main rounded-pill w-100">Reset Password</button>

        </form>
    </div>
</div>

@endsection