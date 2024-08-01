@extends('layouts.app')

@section('title', __('Detail of Grades'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Grades') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of grade.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('grades.index') }}">{{ __('Grades') }}</a>
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
                                        <td class="fw-bold">{{ __('Category') }}</td>
                                        <td>{{ $grade->category ? $grade->category->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Exam') }}</td>
                                        <td>{{ $grade->exam ? $grade->exam->category_id : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('User') }}</td>
                                        <td>{{ $grade->user ? $grade->user->name : '' }}</td>
                                    </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Duration') }}</td>
                                            <td>{{ $grade->duration }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Number') }}</td>
                                            <td>{{ $grade->number }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Section') }}</td>
                                            <td>{{ $grade->section }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Total Section') }}</td>
                                            <td>{{ $grade->total_section }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Start Time') }}</td>
                                            <td>{{ isset($grade->start_time) ? $grade->start_time->format('d/m/Y H:i') : ''  }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('End Time') }}</td>
                                            <td>{{ isset($grade->end_time) ? $grade->end_time->format('d/m/Y H:i') : ''  }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Total Correct') }}</td>
                                            <td>{{ $grade->total_correct }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Grade Old') }}</td>
                                            <td>{{ $grade->grade_old }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Grade') }}</td>
                                            <td>{{ $grade->grade }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Answers') }}</td>
                                            <td>{{ $grade->answers }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Is Finished') }}</td>
                                            <td>{{ $grade->is_finished }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Total Tolerance') }}</td>
                                            <td>{{ $grade->total_tolerance }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Is Blocked') }}</td>
                                            <td>{{ $grade->is_blocked }}</td>
                                        </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $grade->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $grade->updated_at->format('d/m/Y H:i') }}</td>
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
