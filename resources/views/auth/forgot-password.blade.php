@extends('layouts.auth')

@section('title', __('Lupa Password'))

@section('content')
<div class="auth-left bg-main-50 flex-center p-24">
<img src="{{ asset('assets') }}/images/thumbs/login.png" alt="Kampung Inggris Booster Meeting Room">
</div>
<div class="auth-right py-40 px-24 flex-center flex-column">
    <div class="auth-right__inner mx-auto w-100">
        <a href="index.html" class="auth-right__logo">
            <img src="{{ asset('assets') }}/images/logo/Kampung-inggris-booster-logo-landscape.png" alt="Kampung Inggris Booster Logo">
        </a>
        <h2 class="mb-8">Lupa Password</h2>
        <p class="text-gray-600 text-15 mb-32">Enter your email and we'll send your a link to reset your password.</p>

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

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible show fade">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                
            <div class="mb-24">
                <label for="email" class="form-label mb-8 h6">Email </label>
                <div class="position-relative">
                    <input type="email" name="email" class="form-control py-11 ps-40  @error('email') is-invalid @enderror" id="email" placeholder="Email Aktif" value="{{ old('email') }}">
                    <span class="position-absolute top-50 translate-middle-y ms-16 text-gray-600 d-flex"><i class="ph ph-envelope"></i></span>
                </div>
            </div>

            <button type="submit" class="btn btn-main rounded-pill w-100">Kirim Link Reset Password</button>
            <p class="mt-32 text-gray-600 text-center">Sudah punya akun?
                <a href="/login" class="text-main-600 hover-text-decoration-underline"> Login</a>
            </p>

        </form>
    </div>
</div>

@endsection