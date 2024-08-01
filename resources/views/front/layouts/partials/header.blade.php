<div class="container desktop__menu__wrapper">
    <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-6">
            <div class="headerarea__left">
                <div class="headerarea__left__logo">

                    <a href="{{ url('') }}"><img loading="lazy" src="{{ asset('template') }}/front/img/logo/logo.png" alt="logo"></a>
                </div>

            </div>
        </div>
        <div class="col-xl-7 col-lg-7 main_menu_wrap">
            <div class="headerarea__main__menu">
                <nav>
                    <ul>

                        <li class="mega__menu position-static">
                            <a class="headerarea__has__dropdown" href="{{ url('') }}">Beranda</a>
                        </li>

                        <li class="mega__menu position-static">
                            <a class="headerarea__has__dropdown" href="">Tentang Kami</a>                            
                        </li>

                        <li class="mega__menu position-static">
                            <a class="headerarea__has__dropdown" href="">Program<i class="icofont-rounded-down"></i> </a>
                            <div class="headerarea__submenu mega__menu__wrapper">

                                <div class="row">
                                    <div class="col-3 mega__menu__single__wrap">
                                        <h4 class="mega__menu__title"><a href="{{ route('front.program-offline.index') }}">Program Offline </a></h4>
                                        <ul class="mega__menu__item">
                                            <li><a href="">Paket 2 Minggu</a></li>
                                            <li><a href="">Paket 1 Bulan</a></li>
                                            <li><a href="">Paket 2 Bulan</a></li>
                                            <li><a href="">Paket 3 Bulan</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-3 mega__menu__single__wrap">
                                        <h4 class="mega__menu__title"><a href="{{ route('front.program-online.index') }}">Program Online </a></h4>
                                        <ul class="mega__menu__item">
                                            <li><a href="">Paket Private</a></li>
                                            <li><a href="">Paket Semi Private</a></li>
                                            <li><a href="">Paket Regular</a></li>
                                            <li><a href="">TOEFL & IELTS</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-3 mega__menu__single__wrap">
                                        <h4 class="mega__menu__title"><a href="#">Test</a></h4>
                                        <ul class="mega__menu__item">
                                            <li><a href="">Mock Test</a></li>
                                            <li><a href="">Scoring</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-3 mega__menu__single__wrap">
                                        <div class="mega__menu__img">
                                            <a href="#"><img loading="lazy" src="{{ asset('template') }}/front/img/mega/mega_menu_1.png" alt="Mega Menu"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>


                        <li><a class="headerarea__has__dropdown" href="">Events & Promo</a></li>
                        <li><a class="headerarea__has__dropdown" href="">Blog</a></li>

                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="headerarea__right">

                <div class="headerarea__login">
                    <a href="{{ url('/login') }}"><i class="icofont-user-alt-5"></i></a>
                </div>
                <div class="headerarea__button">
                    <a href="{{ url('/daftar') }}">Daftar Sekarang!</a>
                </div>
            </div>
        </div>

    </div>

</div>


<div class="container-fluid mob_menu_wrapper">
    <div class="row align-items-center">
        <div class="col-6">
            <div class="mobile-logo">
                <a class="logo__dark" href="#"><img loading="lazy" src="{{ asset('template') }}/front/img/logo/logo.png" alt="logo"></a>
            </div>
        </div>
        <div class="col-6">
            <div class="header-right-wrap">


                <div class="mobile-off-canvas">
                    <a class="mobile-aside-button" href="#"><i class="icofont-navigation-menu"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>