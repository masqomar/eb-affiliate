<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template') }}/front/img/favicon.ico">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('template') }}/front/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/front/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/front/css/aos.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/front/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('template') }}/front/css/icofont.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/front/css/slick.css">
    <link rel="stylesheet" href="{{ asset('template') }}/front/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/front/css/style.css">

</head>


<body class="body__wrapper">


    <main class="main_wrapper overflow-hidden">

        <!-- topbar__section__stert -->
        <div class="topbararea topbararea--2">
            @include('front.layouts.partials.topbar')
        </div>
        <!-- topbar__section__end -->


        <div class="topbararea topbararea--2 mb-2"></div>

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
                                <h2>English Booster<br /><span>Make Up Your Mind!</span></h2>
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
        <br />
        <!-- footer__section__start -->
        <div class="footerarea">
            <div class="container">
               
                <div class="footerarea__copyright__wrapper footerarea__copyright__wrapper__2">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3">
                            <div class="copyright__logo">
                                <a href="/"><img loading="lazy" src="{{ asset('template') }}/front/img/logo/logo.png" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="footerarea__copyright__content footerarea__copyright__content__2">
                                <p>Copyright © <span>2024</span> by English Booster. All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3">
                            <div class="footerarea__icon footerarea__icon__2">
                                <ul>
                                    <li><a href="https://www.facebook.com/kampunginggrisbooster"><i class="icofont-facebook"></i></a></li>
                                    <li><a href="https://www.instagram.com/kampunginggrisbooster/"><i class="icofont-instagram"></i></a></li>
                                    <li><a href="https://x.com/eboosterpare"><i class="icofont-twitter"></i></a></li>
                                    <li><a href="https://www.youtube.com/@kampunginggrisbooster"><i class="icofont-youtube-play"></i></a></li>
                                    <li><a href="https://www.linkedin.com/company/kampunginggrisbooster"><i class="icofont-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- footer__section__end -->

    </main>

    <!-- JS here -->
    <script src="{{ asset('template') }}/front/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="{{ asset('template') }}/front/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('template') }}/front/js/popper.min.js"></script>
    <script src="{{ asset('template') }}/front/js/bootstrap.min.js"></script>
    <script src="{{ asset('template') }}/front/js/isotope.pkgd.min.js"></script>
    <script src="{{ asset('template') }}/front/js/slick.min.js"></script>
    <script src="{{ asset('template') }}/front/js/jquery.meanmenu.min.js"></script>
    <script src="{{ asset('template') }}/front/js/ajax-form.js"></script>
    <script src="{{ asset('template') }}/front/js/wow.min.js"></script>
    <script src="{{ asset('template') }}/front/js/jquery.scrollUp.min.js"></script>
    <script src="{{ asset('template') }}/front/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('template') }}/front/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('template') }}/front/js/waypoints.min.js"></script>
    <script src="{{ asset('template') }}/front/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('template') }}/front/js/plugins.js"></script>
    <script src="{{ asset('template') }}/front/js/swiper-bundle.min.js"></script>
    <script src="{{ asset('template') }}/front/js/main.js"></script>

</body>

</html>