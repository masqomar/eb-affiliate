<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
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
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
            document.documentElement.classList.add("is_dark");
        }
        if (localStorage.getItem("theme-color") === "light") {
            document.documentElement.classList.remove("is_dark");
        }
    </script>

</head>


<body class="body__wrapper">


    <!-- Dark/Light area start -->
    <div class="mode_switcher my_switcher">
        <button id="light--to-dark-button" class="light align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon dark__mode" viewBox="0 0 512 512">
                <path d="M160 136c0-30.62 4.51-61.61 16-88C99.57 81.27 48 159.32 48 248c0 119.29 96.71 216 216 216 88.68 0 166.73-51.57 200-128-26.39 11.49-57.38 16-88 16-119.29 0-216-96.71-216-216z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
            </svg>

            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon light__mode" viewBox="0 0 512 512">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M256 48v48M256 416v48M403.08 108.92l-33.94 33.94M142.86 369.14l-33.94 33.94M464 256h-48M96 256H48M403.08 403.08l-33.94-33.94M142.86 142.86l-33.94-33.94" />
                <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" />
            </svg>

            <span class="light__mode">Light</span>
            <span class="dark__mode">Dark</span>
        </button>
    </div>
    <!-- Dark/Light area end -->

    <main class="main_wrapper overflow-hidden">

        <div class="checkoutarea sp_bottom_100 sp_top_100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="event__sidebar__wraper" data-aos="fade-up">
                            <h3>Form Pendaftaran</h3>
                            <hr />

                            <form action="{{ route('front.program-offline.store') }}" method="post">
                                @csrf

                                <input type="text" id="affiliate" name="aff_id" value="{{$tenant->id}}">
                                <div class="cartarea__code">
                                    <label for="name">* Nama Lengkap</label>
                                    <input type="text" placeholder="Nama Lengkap" id="name" name="name" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="cartarea__code">
                                    <label for="email">* Email</label>
                                    <input type="email" placeholder="Email" id="email" name="email" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="cartarea__code">
                                    <label for="phone_number">* No HP <sup>WA aktif untuk aktivasi dan pembayaran</sup></label>
                                    <input type="number" placeholder="No HP" id="phone_number" name="phone_number" required>
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="cartarea__select">
                                    <div class="cartarea__tax__select">
                                        <label for="gender">* Jenis Kelamin</label>
                                        <select name="gender" id="gender" required>
                                            <option value="">-</option>
                                            <option value="M">Laki - laki</option>
                                            <option value="F">Perempuan</option>
                                        </select>
                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="cartarea__discount__code">
                                    <p>Alamat Lengkap</p>
                                    <textarea name="address" id="address" required></textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <input type="hidden" class="couponId" name="coupon_id">

                                <hr>
                                <label for="program">* Program</label>
                                <select class="form-select" aria-label="Default select example" id="program-id" required>
                                    <option value="" selected> Pilihan Program </option>
                                    @foreach ($programs as $program)
                                    @if ($program->program_type->category->name == "Kelas Offline")
                                    <option value="{{ $program->id }}"> {{ $program->name }}</option>
                                    @endif
                                    @endforeach
                                </select>


                                <label for="periode">* Periode</label>
                                <select id="period" class="form-select" required>
                                    <option value=""> Pilihan Periode </option>
                                </select>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4">

                        <div class="course__details__sidebar">
                            <div class="event__sidebar__wraper" data-aos="fade-up">

                                <div class="course__summery__lists">
                                    <ul>
                                        <li>
                                            <div class="course__summery__item">
                                                <span class="sb_label">Program:</span>
                                                <span class="sb_content"><strong>a</strong></span>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="course__summery__item">
                                                <span class="sb_label">Periode</span>
                                                <span class="sb_content"><strong>b</strong></span>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="course__summery__item">
                                                <span class="sb_label">Biaya Program</span>
                                                <span class="event__price"><strong>Rp. c</strong></span>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="course__summery__item">
                                                <span class="sb_label">Biaya Admin</span>
                                                <span class="event__price"><strong>Rp. 99,285</strong></span>
                                            </div>
                                        </li>
                                        <hr>

                                        <li>
                                            <div class="course__summery__item">
                                                <span class="sb_label">Subtotal</span>
                                                <span class="event__price"><strong>Rp. d</strong></span>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="course__summery__item">
                                                <span class="sb_label">Diskon</span>
                                                <strong><span class="event__price discountAmount">-</span></strong>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <span>Punya kupon diskon?</span>

                                <div class="input-group mb-1">
                                    <input type="text" class="form-control coupon_code" name="coupon_code">
                                    <button class="default__button default__button--2 apply_coupon_btn">Klaim</button>
                                </div>
                                <small id="error_coupon" class="text-danger mb-3"></small>
                                <small id="coupon_response" class="text-danger mb-3"></small>
                                <br />
                                <br />
                                <br />
                                <div class="course__summery__button">
                                    <button class="default__button" type="submit">Kirim Data</button>
                                    <span>
                                        <i class="icofont-ui-rotation"></i>
                                        Kebijakan Privasi dan Syarat & Ketentuan Kampung Inggris Booster
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
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
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
            document.getElementById("light--to-dark-button")?.classList.add("dark--mode");
        }
        if (localStorage.getItem("theme-color") === "light") {
            document.getElementById("light--to-dark-button")?.classList.remove("dark--mode");
        }
    </script>



</body>

</html>