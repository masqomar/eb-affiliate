@extends('front.layouts.master')

@section('title', __('Log in'))

@section('content')
<!-- login__section__start -->
<div class="loginarea sp_top_100 sp_bottom_100">
    <div class="container">
        <div class="row">


            <div class="tab-content tab__content__wrapper" id="myTabContent" data-aos="fade-up">

                <div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                    <div class="col-xl-8 col-md-8 offset-md-2">
                        <div class="loginarea__wraper">
                            <div class="login__heading">
                                <h5 class="login__title">{{ __('Log in.') }}</h5>
                                <p class="login__description">{{ __('Log in with your data that you entered during registration.') }}</p>
                            </div>


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

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="login__form">
                                    <label class="form__label">Username or email</label>
                                    <input class="common__login__input @error('email') is-invalid @enderror" type="text" placeholder="Your email" name="email" autocomplete="email" required autofocus>

                                </div>
                                <div class="login__form">
                                    <label class="form__label">Password</label>
                                    <input class="common__login__input @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" autocomplete="current-password" required>

                                </div>
                                <div class="login__form d-flex justify-content-between flex-wrap gap-2">
                                    <div class="form__check">
                                        <input id="forgot" type="checkbox" value="" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="forgot"> Remember me</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <div class="text-end login__form__link">
                                        <a href="{{ route('password.request') }}">Forgot your password?</a>
                                    </div>
                                    @endif
                                </div>
                                <div class="login__button">
                                    <button class="default__button">{{ __('Log in') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class=" login__shape__img educationarea__shape_image">
            <img loading="lazy" class="hero__shape hero__shape__1" src="{{ asset('template') }}/front/img/education/hero_shape2.png" alt="Shape">
            <img loading="lazy" class="hero__shape hero__shape__2" src="{{ asset('template') }}/front/img/education/hero_shape3.png" alt="Shape">
            <img loading="lazy" class="hero__shape hero__shape__3" src="{{ asset('template') }}/front/img/education/hero_shape4.png" alt="Shape">
            <img loading="lazy" class="hero__shape hero__shape__4" src="{{ asset('template') }}/front/img/education/hero_shape5.png" alt="Shape">
        </div>

    </div>
</div>

<!-- login__section__end -->
@endsection