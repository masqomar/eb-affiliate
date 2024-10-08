@extends('front.layouts.master')

@section('title', __('Programs'))

@section('content')
<div class="dashboard">
    <div class="container-fluid full__width__padding">
        <div class="row">

            @include('front.layouts.partials.dashboardNav')
            <div class="col-xl-9 col-lg-9 col-md-12">
                <div class="dashboard__content__wraper">
                    <div class="dashboard__section__title">
                        <h4>{{ __('Program') }}</h4>
                        @can('program create')
                        <a href="{{ route('programs.create') }}" class="btn btn-primary mb-3">
                            <i class="fas fa-plus"></i>
                            {{ __('Tambah Data') }}
                        </a>
                        @endcan
                    </div>

                    <section class="section">
                        <x-alert></x-alert>

                        <div class="row">
                            <div class="col-xl-6 col-lg-4 col-md-4 col-12">
                                <div class="dashboard__select__heading">
                                    <span>Courses</span>
                                </div>
                                <div class="dashboard__selector">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>All</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                <div class="dashboard__select__heading">
                                    <span>STATUS</span>
                                </div>
                                <div class="dashboard__selector">
                                    <select id="is_active" class="form-select" aria-label="Default select example">
                                        <option selected value="">Pilih Status</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                <div class="dashboard__select__heading">
                                    <span>SHORT BY PERIOD</span>
                                </div>
                                <div class="dashboard__selector">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Periode</option>
                                        @foreach ($periods as $period)
                                        <option value="{{ $period->period_date }}">{{ $period->period_date }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-40">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="dashboard__table table-responsive">
                                    <table id="data-table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Nama') }}</th>
                                                <th>{{ __('Jenis Program') }}</th>
                                                <th>{{ __('Kategori') }}</th>
                                                <th>{{ __('Periode') }}</th>
                                                <th>{{ __('Biaya') }}</th>
                                                <th>{{ __('Gambar') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Status') }}</th>
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
    $(function() {
        var table = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('programs.index') }}",
                data: function(d) {
                    d.is_active = $('#is_active').val(),
                        d.search = $('input[type="search"]').val()
                }
            },
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'program_type.name',
                    name: 'program_type.name'
                },
                {
                    data: 'program_type.category.name',
                    name: 'program_type.category.name'
                },
                {
                    data: 'period_date',
                    name: 'period_date'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        return `<div class="avatar">
                            <img src="${data}" alt="image" width="20" height="30">
                        </div>`;
                    }
                },
                {
                    data: 'is_active',
                    name: 'is_active',
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false,
                },
            ],
        });

        $('#is_active').change(function() {
            table.draw();
        });

    });
</script>
@endpush