@extends('layouts.app')

@section('title', __('Detail of Exams'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Exams') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of exam.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('exams.index') }}">{{ __('Exams') }}</a>
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
                                        <td>{{ $exam->category ? $exam->category->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Question Title') }}</td>
                                        <td>{{ $exam->question_title ? $exam->question_title->category_id : '' }}</td>
                                    </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Title') }}</td>
                                            <td>{{ $exam->title }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Price') }}</td>
                                            <td>{{ $exam->price }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Duration Type') }}</td>
                                            <td>{{ $exam->duration_type }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Duration') }}</td>
                                            <td>{{ $exam->duration }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Description') }}</td>
                                            <td>{{ $exam->description }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Random Question') }}</td>
                                            <td>{{ $exam->random_question }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Random Answer') }}</td>
                                            <td>{{ $exam->random_answer }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Show Answer') }}</td>
                                            <td>{{ $exam->show_answer }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Show Question Number Navigation') }}</td>
                                            <td>{{ $exam->show_question_number_navigation }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Show Question Number') }}</td>
                                            <td>{{ $exam->show_question_number }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Next Question Automatically') }}</td>
                                            <td>{{ $exam->next_question_automatically }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Show Prev Next Button') }}</td>
                                            <td>{{ $exam->show_prev_next_button }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Type Option') }}</td>
                                            <td>{{ $exam->type_option }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Total Tolerance') }}</td>
                                            <td>{{ $exam->total_tolerance }}</td>
                                        </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $exam->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $exam->updated_at->format('d/m/Y H:i') }}</td>
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
