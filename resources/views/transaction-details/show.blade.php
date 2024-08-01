@extends('layouts.app')

@section('title', __('Detail of Transaction Details'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Transaction Details') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of transaction detail.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('transaction-details.index') }}">{{ __('Transaction Details') }}</a>
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
                                        <td class="fw-bold">{{ __('Transaction') }}</td>
                                        <td>{{ $transactionDetail->transaction ? $transactionDetail->transaction->id : '' }}</td>
                                    </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Invoice') }}</td>
                                            <td>{{ $transactionDetail->invoice }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Tshirt Size') }}</td>
                                            <td>{{ $transactionDetail->tshirt_size }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Full Payment') }}</td>
                                            <td>{{ $transactionDetail->full_payment }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Snap Token') }}</td>
                                            <td>{{ $transactionDetail->snap_token }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Payment Status') }}</td>
                                            <td>{{ $transactionDetail->payment_status }}</td>
                                        </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $transactionDetail->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $transactionDetail->updated_at->format('d/m/Y H:i') }}</td>
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
