@extends('front.layouts.master')
@section('content')
<!-- course__section__start   -->
<div class="coursearea sp_top_100 sp_bottom_100">
    <div class="container">

        <div class="row">
            <div class="col-xl-12">
                <div class="course__text__wraper" data-aos="fade-up">
                    <div class="course__text">
                        <p>Showing 1–12 of 54 Results</p>
                    </div>
                    <div class="course__icon">
                        <ul class="nav property__team__tap" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a href="#" class="single__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__one"><i class="icofont-layout"></i>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#" class="single__tab__link " data-bs-toggle="tab" data-bs-target="#projects__two"><i class="icofont-listine-dots"></i>
                                </a>
                            </li>
                            <li class="short__by__new">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Short by New</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-xl-12">

                <div class="tab-content tab__content__wrapper" id="myTabContent">

                    <div class="tab-pane fade  active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">

                        <div class="row">
                            @foreach ($programTypes as $programType)
                            @if($programType->category_id == true && $programType->category->name == 'Kelas Online')
                            @foreach ($programs as $program)
                            @if($program->program_type_id == $programType->id)
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12" data-aos="fade-up">
                                <div class="gridarea__wraper gridarea__wraper__2">
                                    <div class="gridarea__img">
                                        <a href=""><img loading="lazy" src="{{ asset('template') }}/front/img/grid/grid_1.png" alt="grid"></a>
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
                                            <h3><a href="{{ $program->id }}">{{ $program->name }}</a></h3>
                                        </div>
                                        <div class="gridarea__price">
                                            Rp. {{ number_format($program->price) }} 
                                        </div>
                                        
                                        <a class="default__button" href="{{ route('front.program-online.show', $program->id) }}">Daftar</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>

                    </div>


                    <div class="tab-pane fade" id="projects__two" role="tabpanel" aria-labelledby="projects__two">
                        @foreach ($programTypes as $programType)
                        @if($programType->category->name !== null && $programType->category->name == 'Kelas Online')
                        @foreach ($programs as $program)
                        @if($program->program_type_id == $programType->id)
                        <div class="gridarea__wraper gridarea__wraper__2 gridarea__course__list" data-aos="fade-up">
                            <div class="gridarea__img">
                                <a href=""><img loading="lazy" src="{{ asset('template') }}/front/img/grid/grid_1.png" alt="grid"></a>
                                <div class="gridarea__small__button">
                                    @if($programType->name == 'Program 2 Minggu')
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
                                    <h3><a href="">{{ $program->name }}</a></h3>
                                </div>
                                <div class="gridarea__price">
                                    Rp. {{ number_format($program->price) }} 
                                </div>
                                
                                <a class="default__button" href="{{ route('front.program-online.show', $program->id) }}">Daftar</a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                    </div>

                </div>
            </div>

            <div class="main__pagination__wrapper" data-aos="fade-up">
                <ul class="main__page__pagination">
                    <li><a class="disable" href="#"><i class="icofont-double-left"></i></a></li>
                    <li><a class="active" href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="icofont-double-right"></i></a></li>
                </ul>
            </div>


        </div>

    </div>
</div>
<!-- course__section__end   -->

@endsection