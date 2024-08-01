@extends('front.layouts.master')

@section('title', __('Categories'))

@section('content')
<div class="dashboard">
    <div class="container-fluid full__width__padding">
        <div class="row">

            @include('front.layouts.partials.dashboardNav')
            <div class="col-xl-9 col-lg-9 col-md-12">
                <div class="dashboard__content__wraper">
                    <div class="dashboard__section__title">
                        <h4>{{ __('Kategori Program') }}</h4>
                        @can('category create')
                        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
                            <i class="fas fa-plus"></i>
                            {{ __('Tambah Data') }}
                        </a>
                        @endcan
                    </div>

                    <div class="row">
                        <div class="col-xl-6 col-lg-4 col-md-4 col-12">
                            <div class="dashboard__select__heading">
                                <span>Courses</span>
                            </div>
                            <div class="dashboard__selector">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>All</option>
                                    <option value="1">Web Design</option>
                                    <option value="2">Graphic</option>
                                    <option value="3">English</option>
                                    <option value="4">Spoken English</option>
                                    <option value="5">Art Painting</option>
                                    <option value="6">App Development</option>
                                    <option value="7">Web Application</option>
                                    <option value="7">Php Development</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                            <div class="dashboard__select__heading">
                                <span>SHORT BY</span>
                            </div>
                            <div class="dashboard__selector">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Default</option>
                                    <option value="1">Trending</option>
                                    <option value="2">Price: low to high</option>
                                    <option value="3">Price: low to low</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                            <div class="dashboard__select__heading">
                                <span>SHORT BY OFFER</span>
                            </div>
                            <div class="dashboard__selector">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Free</option>
                                    <option value="1">paid</option>
                                    <option value="2">premimum</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-40">
                    <div class="row">

                        <div class="col-xl-12">
                            <div class="dashboard__table table-responsive" >
                                <table id="data-table">
                                <thead>
                                        <tr>
                                            <th>{{ __('Name') }}</th>
											<th>{{ __('Thumbnail') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
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
        ajax: "{{ route('categories.index') }}",
        columns: [{
                data: 'name',
                name: 'name',
            },
            {
                data: 'thumbnail',
                name: 'thumbnail',
                orderable: false,
                searchable: false,
                render: function(data, type, full, meta) {
                    return `<div class="avatar">
                            <img src="${data}" alt="Thumbnail" >
                        </div>`;
                }
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