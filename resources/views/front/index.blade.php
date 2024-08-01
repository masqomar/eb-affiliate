@extends('front.layouts.master')
@section('content')
<!-- herobannerarea__section__start -->
<div class="herobannerarea herobannerarea__box">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" data-aos="fade-up">
                <div class="herobannerarea__content__wraper">

                    <div class="herobannerarea__title">
                        <div class="herobannerarea__small__title">
                            <span>English Booster</span>
                        </div>
                        <div class="herobannerarea__title__heading__2">
                            <h2>Improve your English skills with our expert tutors in no time</h2>
                        </div>
                    </div>

                    <div class="herobannerarea__text">
                        <p>Cukup satu tempat untuk belajar Bahasa Inggris.</p>
                    </div>
                    <div class="hreobannerarea__button">
                        <a class="herobannerarea__button__1" href="{{ url(env('APP_URL') . "/program-offline/") }}">View Courses</a>
                        <a class="herobannerarea__button__2" href="{{ url(env('APP_URL') . "/program-offline/") }}">Find out more
                            <i class="icofont-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" data-aos="fade-up">
                <div class="aboutarea__img__inner text-center">
                    <div class="aboutarea__img" data-tilt>
                        <img loading="lazy" class="aboutimg__1" src="{{ asset('template') }}/front/img/about/about_8.png" alt="aboutimg">
                        <img loading="lazy" class="aboutimg__2" src="{{ asset('template') }}/front/img/about/about_1.png" alt="aboutimg">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="herobannerarea__icon">
        <img loading="lazy" class="hero__icon__1" src="{{ asset('template') }}/front/img/register/register__2.png" alt="photo">
        <img loading="lazy" class="hero__icon__2" src="{{ asset('template') }}/front/img/herobanner/herobanner__6.png" alt="photo">
        <img loading="lazy" class="hero__icon__3" src="{{ asset('template') }}/front/img/herobanner/herobanner__7.png" alt="photo">
        <img loading="lazy" class="hero__icon__4" src="{{ asset('template') }}/front/img/herobanner/herobanner__7.png" alt="photo">
    </div>
</div>
<!-- herobannerarea__section__end-->



<!-- about__section__start -->
<div class="aboutarea aboutarea__single__course sp_top_50" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-12 col-12 ">
                <div class="aboutarea__img__inner text-center">
                    <div class="aboutarea__img" data-tilt>
                        <img loading="lazy" src="{{ asset('template') }}/front/img/about/about_single_course_1.jpg" alt="">
                    </div>
                </div>


            </div>
            <div class="col-xl-8 col-lg-7 col-md-12 col-12 ">
                <div class="aboutarea__content__wraper">
                    <div class="aboutarea__button">
                        <div class="default__small__button">Who We Are</div>
                    </div>
                    <div class="aboutarea__headding heading__underline">
                        <h2>English Booster<br/><span>Make Up Your Mind!</span></h2>
                    </div>
                    <div class="aboutarea__para">
                        <p>English Booster adalah lembaga pendidikan yang didedikasikan untuk membantu individu meningkatkan kemampuan bahasa Inggris berlokasi di Kampung Inggris Pare Kediri. Dengan pendekatan yang interaktif dan disesuaikan, English Booster menawarkan kursus yang dirancang untuk memenuhi kebutuhan pembelajaran kamu. Instruktur English Booster adalah para ahli bahasa Inggris berpengalaman yang berdedikasi untuk memberikan pengajaran terbaik.<br><br> </p>
                    </div>
                    
                    <div class="aboutarea__list">
                        <ul>
                            <li>
                                <i class="icofont-check"></i> Tutor Berpengalaman lebih dari 100.000 jam mengajar.
                            </li>

                            <li>
                                <i class="icofont-check"></i> Materi Terstruktur untuk memudahkan pembelajaran .
                            </li>

                            <li>
                                <i class="icofont-check"></i> Metode Pembelajaran Interaktif yang cocok buat kamu.
                            </li>

                            <!-- 
                                    <li>
                                        <i class="icofont-check"></i> Variety of fresh educational teach nided bngedesh.
                                    </li> -->
                        </ul>
                    </div>
                    <div class="aboutarea__bottom__button">
                        <a class="default__button" href="{{ url(env('APP_URL') . "/program-offline/") }}"> Learn More About
                            <i class="icofont-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about__section__start -->
<br/>
<br/>
<br/>
@endsection