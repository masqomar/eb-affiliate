@extends('front.layouts.master')
@section('title', __('Pendaftaran English Booster'))
@section('content')
<div class="blogarea__2 sp_top_100 sp_bottom_100">
    <div class="container">
        <div class="row">

            <div class="col-xl-12 col-lg-12">
                <div class="course__details__sidebar">
                    <div class="event__sidebar__wraper" data-aos="fade-up">
                        <h3>Detail Pendaftaran</h3>
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
                                        <span class="sb_label"><strong>Down Payment</strong></span><span class="sb_content"><strong>Rp. {{ number_format($transaction->down_payment) }}</strong></span>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="course__summery__button">
                            @if ($transaction->transaction_status == 'pending')
                            <button class="default__button" id="pay-button">Bayar DP Sekarang</button>
                            @elseif ($transaction->transaction_status == 'failed')
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


@push('js')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
        snap.pay('{{$transaction->snap_token}}', {
            onSuccess: function(result) {
                window.location.href = '{{ route("front.program-offline.payment-success", $transaction->id)}}';
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
@endpush