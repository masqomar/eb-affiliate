@extends('front.layouts.master')

@section('title', __('Edit Role'))

@section('content')
<div class="dashboard">
    <div class="container-fluid full__width__padding">
        <div class="row">

            @include('front.layouts.partials.dashboardNav')
            <div class="col-xl-9 col-lg-9 col-md-12">
                <div class="dashboard__content__wraper">
                    <div class="dashboard__section__title">
                        <h4>{{ __('Update Role') }}</h4>
                        <x-breadcrumb>
                            <li class="breadcrumb-item">
                                <a href="/">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('roles.index') }}">{{ __('Role') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('Edit') }}
                            </li>
                        </x-breadcrumb>
                    </div>

                    <section class="section">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            @include('roles.include.form')

                                            <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Back') }}</a>

                                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection