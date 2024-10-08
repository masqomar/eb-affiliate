@extends('front.layouts.master')

@section('title', __('Dashboard'))

@section('content')
<!-- dashboardarea__area__start  -->
<div class="dashboardarea sp_bottom_100">
    <div class="container-fluid full__width__padding">
        <div class="row">
            <div class="col-xl-12">
                <div class="dashboardarea__wraper">
                    <div class="dashboardarea__img">
                        <div class="dashboardarea__inner admin__dashboard__inner">
                            <div class="dashboardarea__left">
                                <div class="dashboardarea__left__img">
                                    <img loading="lazy" src="{{ asset('template') }}/front/img/dashbord/dashbord__2.jpg" alt="">
                                </div>
                                <div class="dashboardarea__left__content">
                                    <h5>Hi 👋, {{ auth()->user()->name }}</h5>
                                    <h4>{{ __('Selamat datang kembali!') }}</h4>
                                </div>
                            </div>
                            <div class="dashboardarea__star">
                                <i class="icofont-star"></i>
                                <i class="icofont-star"></i>
                                <i class="icofont-star"></i>
                                <i class="icofont-star"></i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg>
                                <span>4.0 (120 Reviews)</span>
                            </div>
                            <div class="dashboardarea__right">
                                <div class="dashboardarea__right__button">
                                    <a class="default__button" href="create-course.html">Create a New Course
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard">
        <div class="container-fluid full__width__padding">
            <div class="row">

                @include('front.layouts.partials.dashboardNav')

                <div class="col-xl-9 col-lg-9 col-md-12">
                    <div class="dashboard__content__wraper">
                        <div class="dashboard__section__title">
                            <h4>Dashboard</h4>
                        </div>
                        <div class="row mb-3">
                            @if ($affId == true)
                            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                <p>Link Affiliate kamu adalah <strong> <a href="{{ url($affId->subdomain_link) }}" target="_blank">{{ $affId->subdomain_link }}</a> </strong></p>
                            </div>
                            @else
                            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                <a href="{{ route('affiliate.register.index') }}">Klik disini</a> untuk melengkapi form pendaftaran akun affiliatemu.
                            </div>
                            @endif
                        </div>
                        <!-- <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                                <div class="dashboard__single__counter">
                                    <div class="counterarea__text__wraper">
                                        <div class="counter__img">
                                            <img loading="lazy" src="{{ asset('template') }}/front/img/counter/counter__1.png" alt="counter">
                                        </div>
                                        <div class="counter__content__wraper">
                                            <div class="counter__number">
                                                <span class="counter">900</span>+

                                            </div>
                                            <p>Enrolled Courses</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                                <div class="dashboard__single__counter">
                                    <div class="counterarea__text__wraper">
                                        <div class="counter__img">
                                            <img loading="lazy" src="{{ asset('template') }}/front/img/counter/counter__2.png" alt="counter">
                                        </div>
                                        <div class="counter__content__wraper">
                                            <div class="counter__number">
                                                <span class="counter">{{ $activeUsers }}</span>+

                                            </div>
                                            <p>Active Courses</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                                <div class="dashboard__single__counter">
                                    <div class="counterarea__text__wraper">
                                        <div class="counter__img">
                                            <img loading="lazy" src="{{ asset('template') }}/front/img/counter/counter__3.png" alt="counter">
                                        </div>
                                        <div class="counter__content__wraper">
                                            <div class="counter__number">
                                                <span class="counter">300</span>k

                                            </div>
                                            <p>Complete Courses</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                                <div class="dashboard__single__counter">
                                    <div class="counterarea__text__wraper">
                                        <div class="counter__img">
                                            <img loading="lazy" src="{{ asset('template') }}/front/img/counter/counter__4.png" alt="counter">
                                        </div>
                                        <div class="counter__content__wraper">
                                            <div class="counter__number">
                                                <span class="counter">{{ $totalPrograms }}</span>+

                                            </div>
                                            <p>Total Courses</p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                                <div class="dashboard__single__counter">
                                    <div class="counterarea__text__wraper">
                                        <div class="counter__img">
                                            <img loading="lazy" src="{{ asset('template') }}/front/img/counter/counter__3.png" alt="counter">
                                        </div>
                                        <div class="counter__content__wraper">
                                            <div class="counter__number">
                                                <span class="counter">30</span>k

                                            </div>
                                            <p>Total Students</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                                <div class="dashboard__single__counter">
                                    <div class="counterarea__text__wraper">
                                        <div class="counter__img">
                                            <img loading="lazy" src="{{ asset('template') }}/front/img/counter/counter__4.png" alt="counter">
                                        </div>
                                        <div class="counter__content__wraper">
                                            <div class="counter__number">
                                                <span class="counter">90,000</span>K+

                                            </div>
                                            <p>Total Earning</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>
<!-- dashboardarea__area__end   -->
@endsection