@extends('front.layouts.master')

@section('title', __('Program Online'))

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
                            <div class="col-xl-12">
                                <div class="dashboard__table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>{{ __('Nama') }}</th>
                                                <th>{{ __('Jenis Program') }}</th>
                                                <th>{{ __('Periode') }}</th>
                                                <th>{{ __('Biaya') }}</th>
                                                <th>{{ __('Gambar') }}</th>
                                                <th>{{ __('Status') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($programs as $program)
                                            @if ($program->program_type->category->name == "Kelas Online")
                                            @if($loop->iteration % 2 == 0)
                                            <tr class="dashboard__table__row">
                                                @else
                                            <tr>
                                                @endif
                                                <td>{{ $program->name }}</td>
                                                <td class="text-center">{{ $program->program_type->name }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach($program->periods as $periode)
                                                        <li> {{ $periode->period_date ? $periode->period_date : '-' }} </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>{{ number_format($program->price) }}</td>
                                                <td>
                                                    @if ($program->image !== null)
                                                    <img src="{{ asset('storage/uploads/images/' . $program->image) }}" alt="{{ $program->name }}" height="50" width="50">
                                                    @else
                                                    <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="{{ $program->name }}" height="50" width="50">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($program->is_active == 1)
                                                    <span class="dashboard__td dashboard__td--over">{{ $program->is_active == 1 ? 'Aktif' : 'Tidak Aktif' }}</span>
                                                    @else
                                                    <span class="dashboard__td dashboard__td--cancel">{{ $program->is_active == 1 ? 'Aktif' : 'Tidak Aktif' }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $programs->links('pagination::bootstrap-5') }}
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