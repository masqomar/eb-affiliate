@extends('layouts.app')

@section('title', __('Detail of Students'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Students') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of student.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('students.index') }}">{{ __('Students') }}</a>
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
                                        <td>{{ $student->user ? $student->user->name : '' }}</td>
                                    </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Province Id') }}</td>
                                            <td>{{ $student->province_id }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('City Id') }}</td>
                                            <td>{{ $student->city_id }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('District Id') }}</td>
                                            <td>{{ $student->district_id }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Village Id') }}</td>
                                            <td>{{ $student->village_id }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Address') }}</td>
                                            <td>{{ $student->address }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Phone Number') }}</td>
                                            <td>{{ $student->phone_number }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Gender') }}</td>
                                            <td>{{ $student->gender }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Is Member') }}</td>
                                            <td>{{ $student->is_member }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Member Access') }}</td>
                                            <td>{{ $student->member_access }}</td>
                                        </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $student->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $student->updated_at->format('d/m/Y H:i') }}</td>
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
