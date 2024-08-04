@extends('front.layouts.master')
@section('title', __('Pendaftaran English Booster'))
@section('content')
<div class="blogarea__2 sp_top_100 sp_bottom_100">
    <div class="container">
        <div class="row">

            <div class="col-xl-12 col-lg-12">
                <div class="course__details__sidebar">
                    <div class="event__sidebar__wraper" data-aos="fade-up">
                        <h3>Detail Pelunasan Pendaftaran</h3>
                        <hr />

                        <div class="course__summery__lists">
                            <ul>
                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Nama:</span><span class="sb_content"><a href="">{{ $transaction->user->name }}</a></span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Email</span><span class="sb_content">{{ $transaction->user->email }}</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">No HP</span><span class="sb_content">{{ $transaction->user->student->phone_number }}</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Jenis Kelamin</span><span class="sb_content">{{ $transaction->user->student->gender == 'M' ? 'Laki-laki' : 'Perempuan' }}</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Alamat</span><span class="sb_content">{{ $transaction->user->student->address }}</span>
                                    </div>
                                </li>

                                <hr />

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Program</span><span class="sb_content">{{ $transaction->program->name }}</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Periode</span><span class="sb_content">{{ $transaction->period }}</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Biaya Program</span><span class="sb_content">Rp. {{ number_format($transaction->program->price) }}</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Biaya Admin</span><span class="sb_content">Rp. {{ number_format($transaction->admin_fee ? $transaction->admin_fee : 0) }}</span>
                                    </div>
                                </li>
                                <hr />

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label"><strong>Subtotal</strong></span><span class="sb_content"><strong>Rp. {{ number_format($transaction->admin_fee + $transaction->program->price) }}</strong></span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label"><strong>Diskon</strong></span><span class="sb_content"><strong>Rp. {{ number_format($transaction->discount ? $transaction->discount : 0) }}</strong></span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label"><strong>Down Payment <sup>20% dari total biaya program</sup></strong></span><span class="sb_content"><strong>Rp. {{ number_format($transaction->down_payment) }}</strong></span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label"><strong>Sisa Pembayaran</strong></span><span class="sb_content"><strong>Rp. {{ number_format($transaction->admin_fee + $transaction->program->price - $transaction->discount - $transaction->down_payment) }}</strong></span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <form action="{{ route('front.program-offline.fullPaymentStore') }}" method="post">
                            @csrf

                            <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                            <div class="cartarea__select">
                                <div class="cartarea__tax__select">
                                    <select name="tshirt_size" id="tshirt_size" required>
                                        <option value="">Silahkan pilih ukuran kaos</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                        <option value="XXXL">XXXL</option>
                                    </select>
                                    @error('tshirt_size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="course__summery__button">
                                <button class="default__button">Proses Pelunasan</button>
                                <span>
                                    *Mohon pastikan data sudah benar semua!
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection