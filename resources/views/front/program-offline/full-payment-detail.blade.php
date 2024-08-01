@extends('front.layouts.master')
@section('content')
<div class="blogarea__2 sp_top_100 sp_bottom_100">
    <div class="container">
        <div class="row">

            <div class="col-xl-12 col-lg-12">
                <div class="course__details__sidebar">
                    <div class="event__sidebar__wraper" data-aos="fade-up">
                        <h3>Detail Pelunasan</h3>
                        <hr />

                        <div class="course__summery__lists">
                            <ul>
                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Nama:</span><span class="sb_content"><a href="">{{ $transactionDetails->transaction->user->name }}</a></span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Email</span><span class="sb_content">{{ $transactionDetails->transaction->user->email }}</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">No HP</span><span class="sb_content">{{ $transactionDetails->transaction->user->student->phone_number }}</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Jenis Kelamin</span><span class="sb_content">{{ $transactionDetails->transaction->user->student->gender == 'M' ? 'Laki-laki' : 'Perempuan' }}</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Alamat</span><span class="sb_content">{{ $transactionDetails->transaction->user->student->address }}</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Ukuran Kaos</span><span class="sb_content">{{ $transactionDetails->tshirt_size }}</span>
                                    </div>
                                </li>

                                <hr />

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Program</span><span class="sb_content">{{ $transactionDetails->transaction->program->name }}</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Periode</span><span class="sb_content">{{ $transactionDetails->transaction->program->period->period_date }}</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Biaya Program</span><span class="sb_content">Rp. {{ number_format($transactionDetails->transaction->program->price) }}</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Biaya Admin</span><span class="sb_content">Rp. {{ number_format($transactionDetails->transaction->admin_fee ? $transactionDetails->transaction->admin_fee : 0) }}</span>
                                    </div>
                                </li>
                                <hr />

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label"><strong>Subtotal</strong></span><span class="sb_content"><strong>Rp. {{ number_format($transactionDetails->transaction->admin_fee + $transactionDetails->transaction->program->price) }}</strong></span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label"><strong>Diskon</strong></span><span class="sb_content"><strong>Rp. {{ number_format($transactionDetails->transaction->discount ? $transactionDetails->transaction->discount : 0) }}</strong></span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label"><strong>Down Payment <sup>20% dari total biaya program</sup></strong></span><span class="sb_content"><strong>Rp. {{ number_format($transactionDetails->transaction->down_payment) }}</strong></span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label"><strong>Sisa Pembayaran</strong></span><span class="sb_content"><strong>Rp. {{ number_format($transactionDetails->transaction->admin_fee + $transactionDetails->transaction->program->price - $transactionDetails->transaction->discount - $transactionDetails->transaction->down_payment) }}</strong></span>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="course__summery__button">
                            @if ($transactionDetails->payment_status == 'pending')
                            <button class="default__button" id="pay-button">Bayar Pelunasan Sekarang</button>
                            @elseif ($transactionDetails->payment_status == 'failed')
                            <button class="default__button default__button--2" href="#">Pembayaran Gagal!</button>
                            @else
                            <button class="default__button default__button--3" href="#">Pembayaran Terverifikasi!</button>
                            @endif
                            <span>
                                *Mohon pastikan data sudah benar semua!
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
        snap.pay('{{$transactionDetails->snap_token}}', {
            onSuccess: function(result) {
                window.location.href = '{{ route("front.program-offline.full-payment-success", $transactionDetails->id)}}';
            },
            onPending: function(result) {
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            onError: function(result) {
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
    };
</script>
@endsection