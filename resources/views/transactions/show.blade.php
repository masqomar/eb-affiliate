@extends('layouts.app')

@section('title', __('Detail of Transactions'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Transactions') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of transaction.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('transactions.index') }}">{{ __('Transactions') }}</a>
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
                                        <td class="fw-bold">{{ __('User') }}</td>
                                        <td>{{ $transaction->user ? $transaction->user->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Exam') }}</td>
                                        <td>{{ $transaction->exam ? $transaction->exam->category_id : '' }}</td>
                                    </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Code') }}</td>
                                            <td>{{ $transaction->code }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Voucher Activated') }}</td>
                                            <td>{{ $transaction->voucher_activated }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Voucher Used') }}</td>
                                            <td>{{ $transaction->voucher_used }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Total Purchases') }}</td>
                                            <td>{{ $transaction->total_purchases }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Maximum Payment Time') }}</td>
                                            <td>{{ isset($transaction->maximum_payment_time) ? $transaction->maximum_payment_time->format('d/m/Y H:i') : ''  }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Transaction Status') }}</td>
                                            <td>{{ $transaction->transaction_status }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Voucher Token') }}</td>
                                            <td>{{ $transaction->voucher_token }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Invoice') }}</td>
                                            <td>{{ $transaction->invoice }}</td>
                                        </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Program') }}</td>
                                        <td>{{ $transaction->program ? $transaction->program->name : '' }}</td>
                                    </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Snap Token') }}</td>
                                            <td>{{ $transaction->snap_token }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Program Date') }}</td>
                                            <td>{{ isset($transaction->program_date) ? $transaction->program_date->format('d/m/Y') : ''  }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Program Time') }}</td>
                                            <td>{{ isset($transaction->program_time) ? $transaction->program_time->format('H:i') : ''  }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Note') }}</td>
                                            <td>{{ $transaction->note }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Discount') }}</td>
                                            <td>{{ $transaction->discount }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Admin Fee') }}</td>
                                            <td>{{ $transaction->admin_fee }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Down Payment') }}</td>
                                            <td>{{ $transaction->down_payment }}</td>
                                        </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $transaction->updated_at->format('d/m/Y H:i') }}</td>
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
