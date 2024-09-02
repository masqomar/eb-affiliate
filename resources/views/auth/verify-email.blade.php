@extends('layouts.auth')

@section('title', __('Verifikasi Email'))

@section('content')

<div class="auth-left bg-main-50 flex-center p-24">
<img src="{{ asset('assets') }}/images/thumbs/login.png" alt="Kampung Inggris Booster Meeting Room">
</div>
<div class="auth-right py-40 px-24 flex-center flex-column">
    <div class="auth-right__inner mx-auto w-100">
        <a href="index.html" class="auth-right__logo">
            <img src="{{ asset('assets') }}/images/logo/Kampung-inggris-booster-logo-landscape.png" alt="Kampung Inggris Booster Logo">
        </a>
        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
        @endif
        <h2 class="mb-8">Verify your email</h2>
        <p class="text-gray-600 text-15 mb-32"> Before proceeding, please check your <span class="fw-medium"> email</span> for a verification link. If you did not receive the email.</p>
        
        <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-main rounded-pill w-100">click here to request another</button>.
        </form>

        <p class="mt-32 text-gray-600 text-center">Akun sudah aktif?
            <a href="/login" class="text-main-600 hover-text-decoration-underline"> Login</a>
        </p>

    </div>
</div>



@endsection