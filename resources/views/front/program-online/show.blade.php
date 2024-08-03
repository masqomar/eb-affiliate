@extends('front.layouts.master')
@section('title', __('Pendaftaran English Booster'))
@section('content')
<div class="checkoutarea sp_bottom_100 sp_top_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="event__sidebar__wraper" data-aos="fade-up">
                    <h3>Form Pendaftaran</h3>
                    <hr />

                    <form action="{{ route('front.program-online.store') }}" method="post">
                        @csrf

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

                        <div class="cartarea__code">
                            <label for="programName">* Program</label>
                            <input type="text" id="programName" value="{{ $program->name }}" readonly>
                            @error('programName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="cartarea__code">
                            <label for="program_date">* Tanggal Kursus</label>
                            <input type="date" placeholder="Tanggal Kursus" id="program_date" name="program_date" required>
                            @error('program_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="cartarea__code">
                            <label for="program_time">* Jam Kursus</label>
                            <input type="time" placeholder="Jam Kursus" id="program_time" name="program_time" required>
                            @error('program_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="cartarea__discount__code">
                            <p>Catatan</p>
                            <textarea name="note" id="note"></textarea>
                            @error('note')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        

                </div>

            </div>

            <div class="col-xl-4 col-lg-4">

                <div class="course__details__sidebar">
                    <div class="event__sidebar__wraper" data-aos="fade-up">

                        <div class="course__summery__lists">
                            <ul>
                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Biaya Program</span>
                                        <span class="event__price"><strong>Rp. {{ number_format($program->price) }}</strong></span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Diskon</span>
                                        <strong><span class="event__price discountAmount">-</span></strong>
                                    </div>
                                </li>
                                <hr>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Subtotal</span>
                                        <span class="event__price finalPrice"><strong>Rp. {{ number_format($program->price ) }}</strong></span>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <span>Punya kupon diskon?</span>

                        <div class="input-group mb-1">
                            <input type="hidden" class="form-control program_id" value="{{ $program->id }}" name="program_id">
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
                                45-Days Money-Back Guarantee
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.apply_coupon_btn').click(function(e) {
        e.preventDefault();

        var program_id = $('.program_id').val();
        var coupon_code = $('.coupon_code').val();

        if ($.trim(coupon_code).length == 0) {
            error_coupon = 'Masukkan kupon yang valid';
            $('#error_coupon').text(error_coupon);
        } else {
            error_coupon = '';
            $('#error_coupon').text(error_coupon);
        }

        if (error_coupon != '') {
            return false;
        }

        $.ajax({

            method: "POST",
            url: "/check-coupon-code-online",
            data: {
                'coupon_code': coupon_code,
                'program_id': program_id
            },
            success: function(response) {
                if (response.status == 'error') {
                    coupon_response = 'Kupon tidak tersedia!';
                    $('.coupon_code').val('');
                    $('#coupon_response').text(response.message);
                } else {
                    var discountAmount = response.discountAmount;
                    var finalPrice = response.finalPrice;
                    $('.couponId').val(response.couponId)
                    $('.discountAmount').text(discountAmount)
                    $('.finalPrice').text(finalPrice)
                    $('#coupon_response').text(response.message);
                }
            }
        });
    });
</script>
@endsection