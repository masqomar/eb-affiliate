@extends('layouts.app')

@section('title', __('Detail of Programs'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Programs') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of program.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('programs.index') }}">{{ __('Programs') }}</a>
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
                                            <td class="fw-bold">{{ __('Name') }}</td>
                                            <td>{{ $program->name }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Price') }}</td>
                                            <td>{{ $program->price }}</td>
                                        </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Image') }}</td>
                                        <td>
                                            @if ($program->image == null)
                                            <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Image"  class="rounded" width="200" height="150" style="object-fit: cover">
                                            @else
                                                <img src="{{ asset('storage/uploads/images/' . $program->image) }}" alt="Image" class="rounded" width="200" height="150" style="object-fit: cover">
                                            @endif
                                        </td>
                                    </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Is Active') }}</td>
                                            <td>{{ $program->is_active }}</td>
                                        </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Period') }}</td>
                                        <td>{{ $program->period ? $program->period->period_date : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Program Type') }}</td>
                                        <td>{{ $program->program_type ? $program->program_type->name : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $program->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $program->updated_at->format('d/m/Y H:i') }}</td>
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
