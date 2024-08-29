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
                            <h4>Estimasi Komisi</h4>
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="dashboard__table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>{{ __('No') }}</th>
                                                <th>{{ __('Komisi Kunjungan') }}</th>
                                                <th>{{ __('Komisi Referal') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>as</td>
                                                <td>Rp. {{ number_format($komisiKunjungan), 0, ',', '.' }}</td>
                                                <td>Rp. {{ number_format($komisiReferal), 0, ',', '.' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>
<!-- dashboardarea__area__end   -->
@endsection