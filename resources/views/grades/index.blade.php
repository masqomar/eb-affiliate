@extends('layouts.app')

@section('title', __('Grades'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Grades') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Below is a list of all grades.') }}
                    </p>
                </div>
                <x-breadcrumb>
                    <li class="breadcrumb-item"><a href="/">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Grades') }}</li>
                </x-breadcrumb>
            </div>
        </div>

        <section class="section">
            <x-alert></x-alert>

                @can('grade create')
                <div class="d-flex justify-content-end">
                    <a href="{{ route('grades.create') }}" class="btn btn-primary mb-3">
                        <i class="fas fa-plus"></i>
                        {{ __('Create a new grade') }}
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
											<th>{{ __('Exam') }}</th>
											<th>{{ __('User') }}</th>
											<th>{{ __('Duration') }}</th>
											<th>{{ __('Number') }}</th>
											<th>{{ __('Section') }}</th>
											<th>{{ __('Total Section') }}</th>
											<th>{{ __('Start Time') }}</th>
											<th>{{ __('End Time') }}</th>
											<th>{{ __('Total Correct') }}</th>
											<th>{{ __('Grade Old') }}</th>
											<th>{{ __('Grade') }}</th>
											<th>{{ __('Answers') }}</th>
											<th>{{ __('Is Finished') }}</th>
											<th>{{ __('Total Tolerance') }}</th>
											<th>{{ __('Is Blocked') }}</th>
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
            ajax: "{{ route('grades.index') }}",
            columns: [
                {
                    data: 'category',
                    name: 'category.name'
                },
				{
                    data: 'exam',
                    name: 'exam.category_id'
                },
				{
                    data: 'user',
                    name: 'user.name'
                },
				{
                    data: 'duration',
                    name: 'duration',
                },
				{
                    data: 'number',
                    name: 'number',
                },
				{
                    data: 'section',
                    name: 'section',
                },
				{
                    data: 'total_section',
                    name: 'total_section',
                },
				{
                    data: 'start_time',
                    name: 'start_time',
                },
				{
                    data: 'end_time',
                    name: 'end_time',
                },
				{
                    data: 'total_correct',
                    name: 'total_correct',
                },
				{
                    data: 'grade_old',
                    name: 'grade_old',
                },
				{
                    data: 'grade',
                    name: 'grade',
                },
				{
                    data: 'answers',
                    name: 'answers',
                },
				{
                    data: 'is_finished',
                    name: 'is_finished',
                },
				{
                    data: 'total_tolerance',
                    name: 'total_tolerance',
                },
				{
                    data: 'is_blocked',
                    name: 'is_blocked',
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
