@extends('layouts.app')

@section('title', __('Detail of Question Titles'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Question Titles') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of question title.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('question-titles.index') }}">{{ __('Question Titles') }}</a>
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
                                        <td>{{ $questionTitle->category ? $questionTitle->category->name : '' }}</td>
                                    </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Name') }}</td>
                                            <td>{{ $questionTitle->name }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Total Choices') }}</td>
                                            <td>{{ $questionTitle->total_choices }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Total Section') }}</td>
                                            <td>{{ $questionTitle->total_section }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Add Value Category') }}</td>
                                            <td>{{ $questionTitle->add_value_category }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Assessment Type') }}</td>
                                            <td>{{ $questionTitle->assessment_type }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Show Answer') }}</td>
                                            <td>{{ $questionTitle->show_answer }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Minimum Grade') }}</td>
                                            <td>{{ $questionTitle->minimum_grade }}</td>
                                        </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $questionTitle->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $questionTitle->updated_at->format('d/m/Y H:i') }}</td>
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
