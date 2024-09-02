@extends('layouts.app')
@section('title', __('Kampung Inggris Booster Affiliate Form'))
@section('content')
<div class="card">
    <div class="card-header border-bottom border-gray-100 flex-align gap-8">
        <h5 class="mb-0">Form Pembuatan Link Affiliate</h5>
        <button type="button" class="text-main-600 text-md d-flex" data-bs-toggle="tooltip"
            data-bs-placement="top" data-bs-title="Form Pembuatan Link Affiliate">
            <i class="ph-fill ph-question"></i>
        </button>
    </div>

    <div class="card-body">

        <form action="{{ route('affiliate.register.store') }}" method="post">
            @csrf

            <div class="row g-20">
                <div class="col-xl-6 col-md-4 col-sm-6">
                    <div class="mb-24">
                        <label for="subdomain" class="form-label mb-8 h6"> Nama Lengkap</label>
                        <div class="position-relative">
                            <div class="input-group mb-1">
                                <input type="text" value="{{ old('subdomain') }}" class="form-control py-11 ps-40 @error('subdomain') is-invalid @enderror" name="subdomain" placeholder="Soni" required>
                                <span class="input-group-text">@kampunginggris.xyz</span>
                            </div>
                            <span class="position-absolute top-50 translate-middle-y ms-16 text-gray-600 d-flex"><i class="ph ph-user"></i></span>
                        </div>
                        @error('subdomain')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-24">
                        <label for="phone_number" class="form-label mb-8 h6">Nomor WA</label>
                        <div class="position-relative">
                            <div class="input-group mb-1">
                                <input type="text" value="{{ old('phone_number') }}" class="form-control py-11 ps-40 @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="11223344" required>
                            </div>
                            <span class="position-absolute top-50 translate-middle-y ms-16 text-gray-600 d-flex"><i class="ph ph-user"></i></span>
                        </div>
                        @error('phone_number')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-24">
                        <label for="address" class="form-label mb-8 h6"> Alamat Lengkap</label>
                        <div class="position-relative">
                            <textarea type="text" name="address" rows="5" value="{{ old('address') }}" class="form-control py-11 ps-40 @error('address') is-invalid @enderror" id="address" placeholder="Alamat Lengkap"></textarea>
                            <span class="position-absolute top-50 translate-middle-y ms-16 text-gray-600 d-flex"><i class="ph ph-user"></i></span>
                        </div>
                        @error('address')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-xl-6 col-md-4 col-sm-6">
                    <div class="mb-24">
                        <label for="account_bank" class="form-label mb-8 h6">Bank</label>
                        <div class="position-relative">
                            <div class="input-group mb-1">
                                <input type="text" value="{{ old('account_bank') }}" class="form-control py-11 ps-40 @error('account_bank') is-invalid @enderror" name="account_bank" placeholder="BRI" required>
                            </div>
                            <span class="position-absolute top-50 translate-middle-y ms-16 text-gray-600 d-flex"><i class="ph ph-user"></i></span>
                        </div>
                        @error('account_bank')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-24">
                        <label for="account_number" class="form-label mb-8 h6">Nomor Rekening</label>
                        <div class="position-relative">
                            <div class="input-group mb-1">
                                <input type="text" value="{{ old('account_number') }}" class="form-control py-11 ps-40 @error('account_number') is-invalid @enderror" name="account_number" placeholder="11223344" required>
                            </div>
                            <span class="position-absolute top-50 translate-middle-y ms-16 text-gray-600 d-flex"><i class="ph ph-user"></i></span>
                        </div>
                        @error('account_number')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-24">
                        <label for="account_name" class="form-label mb-8 h6">Rekening Atas Nama</label>
                        <div class="position-relative">
                            <div class="input-group mb-1">
                                <input type="text" value="{{ old('account_name') }}" class="form-control py-11 ps-40 @error('account_name') is-invalid @enderror" name="account_name" placeholder="Sofa Mania" required>
                            </div>
                            <span class="position-absolute top-50 translate-middle-y ms-16 text-gray-600 d-flex"><i class="ph ph-user"></i></span>
                        </div>
                        @error('account_name')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="mb-32 flex-between flex-wrap gap-8">
                <div class="form-check mb-0 flex-shrink-0">
                    <input class="form-check-input flex-shrink-0 rounded-4" type="checkbox" name="snk" value="1">
                    <label class="form-check-label text-15 flex-grow-1" for="snk">You agree to our friendly Privacy Policy.</label>
                </div>
            </div>
            <button type="submit" class="btn btn-main rounded-pill w-100">Kirim Data</button>
        </form>
    </div>
</div>
@endsection