<div class="row mb-2">
    <div class="col-md-4">
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
    <div class="col-md-4">
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
    <div class="col-md-4">
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
    <div class="col-md-6">
        <div class="form-group">
            <label for="program-type-id">{{ __('Program Offline') }}</label>
            <div class="card border">
                <div class="card-content">
                    <div class="card-body">
                        @foreach ($programs as $program)
                        @if ($program->program_type->category->name == 'Kelas Offline')
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="programs[]" value="{{ $program->id }}" />
                            <label class="form-check-label">
                            {{ $program->name }}
                            </label>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="program-type-id">{{ __('Program Online') }}</label>
            <div class="card border">
                <div class="card-content">
                    <div class="card-body">
                        @foreach ($programs as $program)
                        @if ($program->program_type->category->name == 'Kelas Online')
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="programs[]" value="{{ $program->id }}" />
                            <label class="form-check-label">
                            {{ $program->name }}
                            </label>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>