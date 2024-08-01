@extends('front.layouts.master')

@section('title', __('Users'))

@section('content')
<div class="dashboard">
    <div class="container-fluid full__width__padding">
        <div class="row">

            @include('front.layouts.partials.dashboardNav')
            <div class="col-xl-9 col-lg-9 col-md-12">
                <div class="dashboard__content__wraper">
                    <div class="dashboard__section__title">
                        <h4>{{ __('Kupon Diskon') }}</h4>
                        @can('user create')
                        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">
                            <i class="fas fa-plus"></i>
                            {{ __('Tambah Data') }}
                        </a>
                        @endcan
                    </div>

                    <section class="section">
                        <x-alert></x-alert>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="dashboard__table table-responsive">
                                    <table id="data-table">
                                        <thead>
                                            <tr>
                                                {{-- <th>No</th> --}}
                                                <th>{{ __('Avatar') }}</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('Role') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                    </table>
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
        ajax: "{{ route('users.index') }}",
        columns: [
            // {
            //     data: 'DT_RowIndex',
            //     name: 'DT_RowIndex',
            //     orderable: false,
            //     searchable: false
            // },
            {
                data: 'avatar',
                name: 'avatar',
                orderable: false,
                searchable: false,
                render: function(data, type, full, meta) {
                    return `<div class="avatar">
                            <img src="${data}" alt="avatar">
                        </div>`;
                }
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'role',
                name: 'role'
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