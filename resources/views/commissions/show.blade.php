@extends('layouts.app')

@section('title', __('Detail of Commissions'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Commissions') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of commission.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('commissions.index') }}">{{ __('Commissions') }}</a>
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
                                        <td class="fw-bold">{{ __('Tenant') }}</td>
                                        <td>{{ $commission->tenant ? $commission->tenant->user_id : '' }}</td>
                                    </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Amount') }}</td>
                                            <td>{{ $commission->amount }}</td>
                                        </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Commission Proof') }}</td>
                                        <td>
                                            @if ($commission->commission_proof == null)
                                            <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Commission Proof"  class="rounded" width="200" height="150" style="object-fit: cover">
                                            @else
                                                <img src="{{ asset('storage/uploads/commission_proofs/' . $commission->commission_proof) }}" alt="Commission Proof" class="rounded" width="200" height="150" style="object-fit: cover">
                                            @endif
                                        </td>
                                    </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Note') }}</td>
                                            <td>{{ $commission->note }}</td>
                                        </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $commission->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $commission->updated_at->format('d/m/Y H:i') }}</td>
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
