@extends('layouts.app')

@section('title', __('Detail of Coupons'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Coupons') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of coupon.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('coupons.index') }}">{{ __('Coupons') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Detail') }}
                    </li>
                </x-breadcrumb>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <tr>
                                            <td class="fw-bold">{{ __('Code') }}</td>
                                            <td>{{ $coupon->code }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Amount') }}</td>
                                            <td>{{ $coupon->amount }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Qty') }}</td>
                                            <td>{{ $coupon->qty }}</td>
                                        </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Program') }}</td>
                                        <td>{{ $coupon->program ? $coupon->program->name : '' }}</td>
                                    </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Start Date') }}</td>
                                            <td>{{ isset($coupon->start_date) ? $coupon->start_date->format('d/m/Y') : ''  }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('End Date') }}</td>
                                            <td>{{ isset($coupon->end_date) ? $coupon->end_date->format('d/m/Y') : ''  }}</td>
                                        </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $coupon->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $coupon->updated_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                </table>
                            </div>

                            <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
