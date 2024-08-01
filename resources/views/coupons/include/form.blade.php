<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="code">{{ __('Code') }}</label>
            <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ isset($coupon) ? $coupon->code : old('code') }}" placeholder="{{ __('Code') }}" required />
            @error('code')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="amount">{{ __('Amount') }}</label>
            <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ isset($coupon) ? $coupon->amount : old('amount') }}" placeholder="{{ __('Amount') }}" required />
            @error('amount')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="qty">{{ __('Qty') }}</label>
            <input type="number" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ isset($coupon) ? $coupon->qty : old('qty') }}" placeholder="{{ __('Qty') }}" />
            @error('qty')
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
                            <option value="{{ $program->id }}" {{ isset($coupon) && $coupon->program_id == $program->id ? 'selected' : (old('program_id') == $program->id ? 'selected' : '') }}>
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
            <label for="start-date">{{ __('Start Date') }}</label>
            <input type="date" name="start_date" id="start-date" class="form-control @error('start_date') is-invalid @enderror" value="{{ isset($coupon) && $coupon->start_date ? $coupon->start_date->format('Y-m-d') : old('start_date') }}" placeholder="{{ __('Start Date') }}" />
            @error('start_date')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="end-date">{{ __('End Date') }}</label>
            <input type="date" name="end_date" id="end-date" class="form-control @error('end_date') is-invalid @enderror" value="{{ isset($coupon) && $coupon->end_date ? $coupon->end_date->format('Y-m-d') : old('end_date') }}" placeholder="{{ __('End Date') }}" />
            @error('end_date')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>