@extends('layouts.app')

@section('title', __('Detail of Value Categories'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Value Categories') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of value category.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('value-categories.index') }}">{{ __('Value Categories') }}</a>
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
                                        <td>{{ $valueCategory->category ? $valueCategory->category->name : '' }}</td>
                                    </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Name') }}</td>
                                            <td>{{ $valueCategory->name }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Assessment Type') }}</td>
                                            <td>{{ $valueCategory->assessment_type }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Section') }}</td>
                                            <td>{{ $valueCategory->section }}</td>
                                        </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $valueCategory->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $valueCategory->updated_at->format('d/m/Y H:i') }}</td>
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
