@extends('layouts.app')

@section('title', __('Transactions'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Transactions') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Below is a list of all transactions.') }}
                    </p>
                </div>
                <x-breadcrumb>
                    <li class="breadcrumb-item"><a href="/">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Transactions') }}</li>
                </x-breadcrumb>
            </div>
        </div>

        <section class="section">
            <x-alert></x-alert>

                @can('transaction create')
                <div class="d-flex justify-content-end">
                    <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">
                        <i class="fas fa-plus"></i>
                        {{ __('Create a new transaction') }}
                    </a>
                </div>
                @endcan

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive p-1">
                                <table class="table table-striped" id="data-table" width="100%">
                                    <thead>
                                        <tr>
											<th>{{ __('Code') }}</th>
                                            <th>{{ __('User') }}</th>
											<th>{{ __('Exam') }}</th>
											<th>{{ __('Voucher Activated') }}</th>
											<th>{{ __('Voucher Used') }}</th>
											<th>{{ __('Total Purchases') }}</th>
											<th>{{ __('Maximum Payment Time') }}</th>
											<th>{{ __('Transaction Status') }}</th>
											<th>{{ __('Voucher Token') }}</th>
											<th>{{ __('Invoice') }}</th>
											<th>{{ __('Program') }}</th>
											<th>{{ __('Snap Token') }}</th>
											<th>{{ __('Program Date') }}</th>
											<th>{{ __('Program Time') }}</th>
											<th>{{ __('Note') }}</th>
											<th>{{ __('Discount') }}</th>
											<th>{{ __('Admin Fee') }}</th>
											<th>{{ __('Down Payment') }}</th>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __('Updated At') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.0/datatables.min.css" />
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.0/datatables.min.js"></script>
    <script>
        $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('transactions.index') }}",
            columns: [
                {
                    data: 'code',
                    name: 'code',
                },
                {
                    data: 'user',
                    name: 'user.name'
                },
				{
                    data: 'exam',
                    name: 'exam.category_id'
                },
				
				{
                    data: 'voucher_activated',
                    name: 'voucher_activated',
                },
				{
                    data: 'voucher_used',
                    name: 'voucher_used',
                },
				{
                    data: 'total_purchases',
                    name: 'total_purchases',
                },
				{
                    data: 'maximum_payment_time',
                    name: 'maximum_payment_time',
                },
				{
                    data: 'transaction_status',
                    name: 'transaction_status',
                },
				{
                    data: 'voucher_token',
                    name: 'voucher_token',
                },
				{
                    data: 'invoice',
                    name: 'invoice',
                },
				{
                    data: 'program',
                    name: 'program.name'
                },
				{
                    data: 'snap_token',
                    name: 'snap_token',
                },
				{
                    data: 'program_date',
                    name: 'program_date',
                },
				{
                    data: 'program_time',
                    name: 'program_time',
                },
				{
                    data: 'note',
                    name: 'note',
                },
				{
                    data: 'discount',
                    name: 'discount',
                },
				{
                    data: 'admin_fee',
                    name: 'admin_fee',
                },
				{
                    data: 'down_payment',
                    name: 'down_payment',
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'updated_at',
                    name: 'updated_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
        });
    </script>
@endpush
