@extends('front.layouts.master')
@section('content')
<!-- grid__section__start -->
<div class="gridarea">
    <div class="container-fluid full__width__padding">
        <div class="row">
            <div class="section__title text-center" data-aos="fade-up">
                <div class="section__title__button">
                    <div class="default__small__button">Course List</div>
                </div>
                <div class="section__title__heading heading__underline">
                    <h2>Perfect Offline <span>Course</span>
                        <br> For Your Academic & Carrer
                    </h2>
                </div>
            </div>
        </div>


        <div class="row" data-aos="fade-up">
            <div class="col-xl-12">
                <div class="gridfilter_nav grid__filter gridFilter">
                    <button class="active" data-filter="*">All</button>
                    @foreach ($programTypes as $programType)
                    @if($programType->category_id == true && $programType->category->name == 'Kelas Offline')
                    <button data-filter=".{{ $programType->id }}" class="">{{ $programType->name }}</button>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>


        <div class="row grid" data-aos="fade-up">
            @foreach ($programTypes as $programType)
            @if($programType->category_id == true && $programType->category->name == 'Kelas Offline')
            @foreach ($programs as $program)
            @if($program->program_type_id == $programType->id)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 grid-item {{ $programType->id }} filter3">
                <div class="gridarea__wraper">
                    <div class="gridarea__img">
                        @if ($program->image == null)
                        <a href="{{ route('front.program-offline.show', $program->id) }}"><img loading="lazy" src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="grid"></a>
                        @else
                        <a href="{{ route('front.program-offline.show', $program->id) }}"><img loading="lazy" src="{{'storage/uploads/images/' . $program->image }}" alt="grid"></a>
                        @endif
                        <div class="gridarea__small__button">
                            @if($programType->name == 'Program 2 Minguu')
                            <div class="grid__badge blue__color">{{ $programType->name }}</div>
                            @elseif($programType->name == 'Program 1 Bulan')
                            <div class="grid__badge green__color">{{ $programType->name }}</div>
                            @elseif($programType->name == 'Program 2 Bulan')
                            <div class="grid__badge pink__color">{{ $programType->name }}</div>
                            @elseif($programType->name == 'Program 3 Bulan')
                            <div class="grid__badge white__color">{{ $programType->name }}</div>
                            @else
                            <div class="grid__badge">{{ $programType->name }}</div>
                            @endif
                        </div>
                        <div class="gridarea__small__icon">
                            <a href="#"><i class="icofont-heart-alt"></i></a>
                        </div>

                    </div>
                    <div class="gridarea__content">
                        <div class="gridarea__heading">
                            <h3><a href="{{ route('front.program-offline.show', $program->id) }}">{{ $program->name }}</a></h3>
                        </div>
                        <div class="gridarea__price">
                            Rp. {{ number_format($program->price) }} <del>/ Rp. {{ number_format($program->price*0.2 + $program->price) }} </del>
                        </div>
                        <div class="gridarea__bottom">

                            <a class="default__button" href="{{ route('front.program-offline.show', $program->id) }}">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endif
            @endforeach
        </div>
    </div>
</div>
<!-- grid__section__end -->


@endsection