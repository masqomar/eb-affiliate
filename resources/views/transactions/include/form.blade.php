<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="user-id">{{ __('User') }}</label>
            <select class="form-select @error('user_id') is-invalid @enderror" name="user_id" id="user-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select user') }} --</option>
                
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ isset($transaction) && $transaction->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
            </select>
            @error('user_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="exam-id">{{ __('Exam') }}</label>
            <select class="form-select @error('exam_id') is-invalid @enderror" name="exam_id" id="exam-id" class="form-control">
                <option value="" selected disabled>-- {{ __('Select exam') }} --</option>
                
                        @foreach ($exams as $exam)
                            <option value="{{ $exam->id }}" {{ isset($transaction) && $transaction->exam_id == $exam->id ? 'selected' : (old('exam_id') == $exam->id ? 'selected' : '') }}>
                                {{ $exam->category_id }}
                            </option>
                        @endforeach
            </select>
            @error('exam_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="code">{{ __('Code') }}</label>
            <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ isset($transaction) ? $transaction->code : old('code') }}" placeholder="{{ __('Code') }}" required />
            @error('code')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="voucher-activated">{{ __('Voucher Activated') }}</label>
            <input type="number" name="voucher_activated" id="voucher-activated" class="form-control @error('voucher_activated') is-invalid @enderror" value="{{ isset($transaction) ? $transaction->voucher_activated : old('voucher_activated') }}" placeholder="{{ __('Voucher Activated') }}" required />
            @error('voucher_activated')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="voucher-used">{{ __('Voucher Used') }}</label>
            <input type="number" name="voucher_used" id="voucher-used" class="form-control @error('voucher_used') is-invalid @enderror" value="{{ isset($transaction) ? $transaction->voucher_used : old('voucher_used') }}" placeholder="{{ __('Voucher Used') }}" required />
            @error('voucher_used')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="total-purchase">{{ __('Total Purchases') }}</label>
            <input type="number" name="total_purchases" id="total-purchase" class="form-control @error('total_purchases') is-invalid @enderror" value="{{ isset($transaction) ? $transaction->total_purchases : old('total_purchases') }}" placeholder="{{ __('Total Purchases') }}" required />
            @error('total_purchases')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="maximum-payment-time">{{ __('Maximum Payment Time') }}</label>
            <input type="datetime-local" name="maximum_payment_time" id="maximum-payment-time" class="form-control @error('maximum_payment_time') is-invalid @enderror" value="{{ isset($transaction) && $transaction->maximum_payment_time ? $transaction->maximum_payment_time->format('Y-m-d\TH:i') : old('maximum_payment_time') }}" placeholder="{{ __('Maximum Payment Time') }}" required />
            @error('maximum_payment_time')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="transaction-status">{{ __('Transaction Status') }}</label>
            <select class="form-select @error('transaction_status') is-invalid @enderror" name="transaction_status" id="transaction-status" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select transaction status') }} --</option>
                <option value="pending" {{ isset($transaction) && $transaction->transaction_status == 'pending' ? 'selected' : (old('transaction_status') == 'pending' ? 'selected' : '') }}>pending</option>
		<option value="paid" {{ isset($transaction) && $transaction->transaction_status == 'paid' ? 'selected' : (old('transaction_status') == 'paid' ? 'selected' : '') }}>paid</option>
		<option value="failed" {{ isset($transaction) && $transaction->transaction_status == 'failed' ? 'selected' : (old('transaction_status') == 'failed' ? 'selected' : '') }}>failed</option>
		<option value="done" {{ isset($transaction) && $transaction->transaction_status == 'done' ? 'selected' : (old('transaction_status') == 'done' ? 'selected' : '') }}>done</option>			
            </select>
            @error('transaction_status')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="voucher-token">{{ __('Voucher Token') }}</label>
            <input type="text" name="voucher_token" id="voucher-token" class="form-control @error('voucher_token') is-invalid @enderror" value="{{ isset($transaction) ? $transaction->voucher_token : old('voucher_token') }}" placeholder="{{ __('Voucher Token') }}" />
            @error('voucher_token')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="invoice">{{ __('Invoice') }}</label>
            <input type="text" name="invoice" id="invoice" class="form-control @error('invoice') is-invalid @enderror" value="{{ isset($transaction) ? $transaction->invoice : old('invoice') }}" placeholder="{{ __('Invoice') }}" />
            @error('invoice')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="program-id">{{ __('Program') }}</label>
            <select class="form-select @error('program_id') is-invalid @enderror" name="program_id" id="program-id" class="form-control">
                <option value="" selected disabled>-- {{ __('Select program') }} --</option>
                
                        @foreach ($programs as $program)
                            <option value="{{ $program->id }}" {{ isset($transaction) && $transaction->program_id == $program->id ? 'selected' : (old('program_id') == $program->id ? 'selected' : '') }}>
                                {{ $program->name }}
                            </option>
                        @endforeach
            </select>
            @error('program_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="snap-token">{{ __('Snap Token') }}</label>
            <input type="text" name="snap_token" id="snap-token" class="form-control @error('snap_token') is-invalid @enderror" value="{{ isset($transaction) ? $transaction->snap_token : old('snap_token') }}" placeholder="{{ __('Snap Token') }}" />
            @error('snap_token')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="program-date">{{ __('Program Date') }}</label>
            <input type="date" name="program_date" id="program-date" class="form-control @error('program_date') is-invalid @enderror" value="{{ isset($transaction) && $transaction->program_date ? $transaction->program_date->format('Y-m-d') : old('program_date') }}" placeholder="{{ __('Program Date') }}" />
            @error('program_date')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="program-time">{{ __('Program Time') }}</label>
            <input type="time" name="program_time" id="program-time" class="form-control @error('program_time') is-invalid @enderror" value="{{ isset($transaction) && $transaction->program_time ? $transaction->program_time->format('H:i') : old('program_time') }}" placeholder="{{ __('Program Time') }}" />
            @error('program_time')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="note">{{ __('Note') }}</label>
            <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror" placeholder="{{ __('Note') }}">{{ isset($transaction) ? $transaction->note : old('note') }}</textarea>
            @error('note')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="discount">{{ __('Discount') }}</label>
            <input type="number" name="discount" id="discount" class="form-control @error('discount') is-invalid @enderror" value="{{ isset($transaction) ? $transaction->discount : old('discount') }}" placeholder="{{ __('Discount') }}" />
            @error('discount')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="admin-fee">{{ __('Admin Fee') }}</label>
            <input type="number" name="admin_fee" id="admin-fee" class="form-control @error('admin_fee') is-invalid @enderror" value="{{ isset($transaction) ? $transaction->admin_fee : old('admin_fee') }}" placeholder="{{ __('Admin Fee') }}" />
            @error('admin_fee')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="down-payment">{{ __('Down Payment') }}</label>
            <input type="number" name="down_payment" id="down-payment" class="form-control @error('down_payment') is-invalid @enderror" value="{{ isset($transaction) ? $transaction->down_payment : old('down_payment') }}" placeholder="{{ __('Down Payment') }}" />
            @error('down_payment')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>