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
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                                <div class="dashboard__single__counter">
                                    <div class="counterarea__text__wraper">
                                        <div class="counter__img">
                                            <img loading="lazy" src="{{ asset('template') }}/front/img/counter/counter__4.png" alt="counter">
                                        </div>
                                        <div class="counter__content__wraper">
                                            <div class="counter__number">
                                                <span class="counter">{{ $totalVisitCount}}</span>

                                            </div>
                                            <p>Total Clicks</p>

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
                                            <p>Total Referal</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                                <div class="dashboard__single__counter">
                                    <div class="counterarea__text__wraper">
                                        <div class="counter__content__wraper">
                                            <div class="counter__number">
                                                <span class="counter">90,000</span>K+

                                            </div>
                                            <p>Total Earning</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="course__details__tab__wrapper" data-aos="fade-up">
                            <div class="row">
                                <div class="col-xl-12">
                                    <ul class="nav  course__tap__wrap" id="myTab" role="tablist">

                                        <li class="nav-item" role="presentation">
                                            <button class="single__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__two" type="button"><i class="icofont-book-alt"></i>History Kunjungan</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__one" type="button"><i class="icofont-paper"></i>History Referal</button>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content tab__content__wrapper" id="myTabContent">
                                <div class="tab-pane fade  active show" id="projects__two" role="tabpanel" aria-labelledby="projects__two">

                                    <div class="col-xl-12">
                                        <div class="dashboard__table table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('No') }}</th>
                                                        <th>{{ __('IP') }}</th>
                                                        <th>{{ __('Tanggal') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($historyVisit['visits'] as $visit)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $visit['data']['ip'] }}</td>
                                                        <td>{{ $visit['created_at']->format('d-m-Y H:i') }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                                    
                                    <div class="col-xl-12">
                                        <div class="dashboard__table table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('No') }}</th>
                                                        <th>{{ __('Kode') }}</th>
                                                        <th>{{ __('Nama') }}</th>
                                                        <th>{{ __('Program') }}</th>
                                                        <th>{{ __('Biaya') }}</th>
                                                        <th>{{ __('Pembayaran') }}</th>
                                                        <th>{{ __('Status') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($historyReferal['transactions'] as $transaction)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $transaction['code'] }}</td>
                                                        <td>{{ $transaction['user']['name'] }}</td>
                                                        <td>{{ $transaction['program']['name'] }}</td>
                                                        <td>Rp. {{ number_format($transaction['program']['price'], 0, ',', '.') }}</td>
                                                        <td>Rp. {{ number_format($transaction['down_payment'], 0, ',', '.') }}</td>
                                                        <td>{{ $transaction['transaction_status'] }}</td>
                                                    </tr>
                                                    @endforeach
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
    </div>

</div>
<!-- dashboardarea__area__end   -->
@endsection