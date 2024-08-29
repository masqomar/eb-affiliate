@extends('front.layouts.master')
@section('title', __('Kampung Inggris Booster Affiliate Form'))
@section('content')

<div class="become__instructor sp_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="become__instructor__heading">
                    <h2>Form Pendaftaran Affiliate</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                <div class="become__instructor__text">
                    <h3 class="become__instructor__small__heading">Become an Instructor</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus blanditiis officiis vero fugiat inventore voluptates sint magnam, accusantium cupiditate odio dolore ipsam ut, corrupti quisquam veritatis pariatur harum labore voluptatibus consectetur dolorem aliquid soluta.</p>
                    <h3 class="become__instructor__small__heading">Instructor Rules</h3>
                    <p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                        (injected humour and the like).</p>
                    <div class="become__instructor__list">
                        <ul>
                            <li>
                                <div class="become__instructor__img">
                                    <img loading="lazy" src="{{ asset('template') }}/front/img/dashbord/check__1.png" alt="">
                                </div>

                                Basic knowledge and detailed understanding of CSS3 to create.
                            </li>
                            <li>
                                <div class="become__instructor__img">
                                    <img loading="lazy" src="{{ asset('template') }}/front/img/dashbord/check__1.png" alt="">
                                </div>

                                Details Idea about HTMLS, Creating Basic Web Pages using HTMLS
                            </li>
                        </ul>
                    </div>

                    <h3 class="become__instructor__small__heading">Start With courses</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam facilis inventore tempora maxime quibusdam cumque aperiam? Ducimus totam repellendus fugiat vel dolorum. Commodi, vel. Aliquid quia voluptas esse accusantium? Libero impedit, odit dolorum sint fugit error.</p>
                    <div class="become__instructor__list">
                        <ul>
                            <li>
                                <div class="become__instructor__img">
                                    <img loading="lazy" src="{{ asset('template') }}/front/img/dashbord/check__1.png" alt="">
                                </div>

                                Basic knowledge and detailed understanding of CSS3 to create.
                            </li>
                            <li>
                                <div class="become__instructor__img">
                                    <img loading="lazy" src="{{ asset('template') }}/front/img/dashbord/check__1.png" alt="">
                                </div>

                                Details Idea about HTMLS, Creating Basic Web Pages using HTMLS
                            </li>

                        </ul>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, voluptas.</p>

                </div>
            </div>



            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                <form action="{{ route('affiliate.register.store') }}" method="post">
                    @csrf
                    <div class="become__instructor__form">
                        <div class="row">
                            <label for="#">Subdomain</label>
                            <div class="input-group mb-1">
                                <input type="text" class="form-control" name="subdomain" placeholder="Soni" required>
                                <span class="input-group-text">@kampunginggris.xyz</span>
                            </div>


                            <div class="col-xl-12">
                                <div class="dashboard__form__wraper">
                                    <div class="dashboard__form__input">
                                        <label for="#">Bank</label>
                                        <input type="text" name="account_bank" placeholder="Nama Bank" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="dashboard__form__wraper">
                                    <div class="dashboard__form__input">
                                        <label for="#">Nomor Rekening</label>
                                        <input type="text" name="account_number" placeholder="Tulis nomor rekening pencairan" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="dashboard__form__wraper">
                                    <div class="dashboard__form__input">
                                        <label for="#">Atas Nama</label>
                                        <input type="text" name="account_name" placeholder="Tulis atas nama rekening pencairan" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="dashboard__form__wraper">
                                    <div class="dashboard__form__input">
                                        <label for="#">Nomor Telepon/WA Aktif</label>
                                        <input type="text" name="phone_number" placeholder="082231050500" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="dashboard__form__wraper">
                                    <div class="dashboard__form__input">
                                        <label for="#">Alamat Lengkap</label>
                                        <textarea name="address" id="" cols="30"
                                            rows="10" placeholder="Tulis alamat lengkapmu" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="become__instructor__check">
                                <input class="become__instructor__check__input" type="checkbox" name="snk" value="1" id="flexCheckDefault" required>
                                <label class="become__instructor__check__label" for="flexCheckDefault">
                                    You agree to our friendly <a href="privacy-policy.html">Privacy Policy</a>.
                                </label>
                            </div>


                            <div class="col-xl-12">
                                <div class="dashboard__form__button">
                                    <button class="default__button" type="submit">Kirim Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection