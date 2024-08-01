<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="transaction-id">{{ __('Transaction') }}</label>
            <select class="form-select @error('transaction_id') is-invalid @enderror" name="transaction_id" id="transaction-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select transaction') }} --</option>
                
                        @foreach ($transactions as $transaction)
                            <option value="{{ $transaction->id }}" {{ isset($transactionDetail) && $transactionDetail->transaction_id == $transaction->id ? 'selected' : (old('transaction_id') == $transaction->id ? 'selected' : '') }}>
                                {{ $transaction->id }}
                            </option>
                        @endforeach
            </select>
            @error('transaction_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="invoice">{{ __('Invoice') }}</label>
            <input type="text" name="invoice" id="invoice" class="form-control @error('invoice') is-invalid @enderror" value="{{ isset($transactionDetail) ? $transactionDetail->invoice : old('invoice') }}" placeholder="{{ __('Invoice') }}" required />
            @error('invoice')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="tshirt-size">{{ __('Tshirt Size') }}</label>
            <input type="text" name="tshirt_size" id="tshirt-size" class="form-control @error('tshirt_size') is-invalid @enderror" value="{{ isset($transactionDetail) ? $transactionDetail->tshirt_size : old('tshirt_size') }}" placeholder="{{ __('Tshirt Size') }}" required />
            @error('tshirt_size')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="full-payment">{{ __('Full Payment') }}</label>
            <input type="number" name="full_payment" id="full-payment" class="form-control @error('full_payment') is-invalid @enderror" value="{{ isset($transactionDetail) ? $transactionDetail->full_payment : old('full_payment') }}" placeholder="{{ __('Full Payment') }}" required />
            @error('full_payment')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="snap-token">{{ __('Snap Token') }}</label>
            <input type="text" name="snap_token" id="snap-token" class="form-control @error('snap_token') is-invalid @enderror" value="{{ isset($transactionDetail) ? $transactionDetail->snap_token : old('snap_token') }}" placeholder="{{ __('Snap Token') }}" />
            @error('snap_token')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="payment-status">{{ __('Payment Status') }}</label>
            <select class="form-select @error('payment_status') is-invalid @enderror" name="payment_status" id="payment-status" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select payment status') }} --</option>
                <option value="pending" {{ isset($transactionDetail) && $transactionDetail->payment_status == 'pending' ? 'selected' : (old('payment_status') == 'pending' ? 'selected' : '') }}>pending</option>
		<option value="paid" {{ isset($transactionDetail) && $transactionDetail->payment_status == 'paid' ? 'selected' : (old('payment_status') == 'paid' ? 'selected' : '') }}>paid</option>
		<option value="failed" {{ isset($transactionDetail) && $transactionDetail->payment_status == 'failed' ? 'selected' : (old('payment_status') == 'failed' ? 'selected' : '') }}>failed</option>
		<option value="done" {{ isset($transactionDetail) && $transactionDetail->payment_status == 'done' ? 'selected' : (old('payment_status') == 'done' ? 'selected' : '') }}>done</option>			
            </select>
            @error('payment_status')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>