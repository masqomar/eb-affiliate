@extends('layouts.app')

@section('title', __('Exams'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Exams') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Below is a list of all exams.') }}
                    </p>
                </div>
                <x-breadcrumb>
                    <li class="breadcrumb-item"><a href="/">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Exams') }}</li>
                </x-breadcrumb>
            </div>
        </div>

        <section class="section">
            <x-alert></x-alert>

                @can('exam create')
                <div class="d-flex justify-content-end">
                    <a href="{{ route('exams.create') }}" class="btn btn-primary mb-3">
                        <i class="fas fa-plus"></i>
                        {{ __('Create a new exam') }}
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
                                            <th>{{ __('Category') }}</th>
											<th>{{ __('Question Title') }}</th>
											<th>{{ __('Title') }}</th>
											<th>{{ __('Price') }}</th>
											<th>{{ __('Duration Type') }}</th>
											<th>{{ __('Duration') }}</th>
											<th>{{ __('Description') }}</th>
											<th>{{ __('Random Question') }}</th>
											<th>{{ __('Random Answer') }}</th>
											<th>{{ __('Show Answer') }}</th>
											<th>{{ __('Show Question Number Navigation') }}</th>
											<th>{{ __('Show Question Number') }}</th>
											<th>{{ __('Next Question Automatically') }}</th>
											<th>{{ __('Show Prev Next Button') }}</th>
											<th>{{ __('Type Option') }}</th>
											<th>{{ __('Total Tolerance') }}</th>
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
            ajax: "{{ route('exams.index') }}",
            columns: [
                {
                    data: 'category',
                    name: 'category.name'
                },
				{
                    data: 'question_title',
                    name: 'question_title.category_id'
                },
				{
                    data: 'title',
                    name: 'title',
                },
				{
                    data: 'price',
                    name: 'price',
                },
				{
                    data: 'duration_type',
                    name: 'duration_type',
                },
				{
                    data: 'duration',
                    name: 'duration',
                },
				{
                    data: 'description',
                    name: 'description',
                },
				{
                    data: 'random_question',
                    name: 'random_question',
                },
				{
                    data: 'random_answer',
                    name: 'random_answer',
                },
				{
                    data: 'show_answer',
                    name: 'show_answer',
                },
				{
                    data: 'show_question_number_navigation',
                    name: 'show_question_number_navigation',
                },
				{
                    data: 'show_question_number',
                    name: 'show_question_number',
                },
				{
                    data: 'next_question_automatically',
                    name: 'next_question_automatically',
                },
				{
                    data: 'show_prev_next_button',
                    name: 'show_prev_next_button',
                },
				{
                    data: 'type_option',
                    name: 'type_option',
                },
				{
                    data: 'total_tolerance',
                    name: 'total_tolerance',
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
