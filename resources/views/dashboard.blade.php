@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
@if (session('status'))
<div class="alert alert-success alert-dismissible show fade">
    {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row gy-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4>Hi 👋, {{ auth()->user()->name }}</h4>
                <p>Selamat datang kembali!</p>
                @if ($affId == true)
                <p>Link Affiliate kamu adalah <strong> <a href="{{ url($affId->subdomain_link) }}" target="_blank">{{ $affId->subdomain_link }}</a> </strong></p>
                @else
                <a href="{{ route('affiliate.register.index') }}">Klik disini</a> untuk melengkapi form pendaftaran akun affiliatemu.
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <!-- Widgets Start -->
        <div class="row gy-4">
            <div class="col-xxl-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-2">{{ number_format($totalVisitCount) }}</h4>
                        <span class="text-gray-600">Kunjungan Link Affiliate</span>
                        <div class="flex-between gap-8 mt-16">
                            <span class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-main-600 text-white text-2xl"><i class="ph-fill ph-book-open"></i></span>
                            <div id="complete-course" class="remove-tooltip-title rounded-tooltip-value"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-2">39+</h4>
                        <span class="text-gray-600">Prospek Lead</span>
                        <div class="flex-between gap-8 mt-16">
                            <span class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-main-two-600 text-white text-2xl"><i class="ph-fill ph-certificate"></i></span>
                            <div id="earned-certificate" class="remove-tooltip-title rounded-tooltip-value"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-2">25+</h4>
                        <span class="text-gray-600">Komisi</span>
                        <div class="flex-between gap-8 mt-16">
                            <span class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-purple-600 text-white text-2xl"> <i class="ph-fill ph-graduation-cap"></i></span>
                            <div id="course-progress" class="remove-tooltip-title rounded-tooltip-value"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Widgets End -->
    </div>

    <div class="col-lg-3">
        <!-- Calendar Start -->
        <div class="card">
            <div class="card-body">
                <div class="calendar">
                    <div class="calendar__header">
                        <button type="button" class="calendar__arrow left"><i class="ph ph-caret-left"></i></button>
                        <p class="display h6 mb-0">""</p>
                        <button type="button" class="calendar__arrow right"><i class="ph ph-caret-right"></i></button>
                    </div>

                    <div class="calendar__week week">
                        <div class="calendar__week-text">Su</div>
                        <div class="calendar__week-text">Mo</div>
                        <div class="calendar__week-text">Tu</div>
                        <div class="calendar__week-text">We</div>
                        <div class="calendar__week-text">Th</div>
                        <div class="calendar__week-text">Fr</div>
                        <div class="calendar__week-text">Sa</div>
                    </div>
                    <div class="days"></div>
                </div>
            </div>
        </div>
        <!-- Calendar End -->

    </div>

</div>
@endsection