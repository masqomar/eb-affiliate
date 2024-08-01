<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="period-date">{{ __('Period Date') }}</label>
            <input type="date" name="period_date" id="period-date" class="form-control @error('period_date') is-invalid @enderror" value="{{ isset($period) && $period->period_date ? $period->period_date->format('Y-m-d') : old('period_date') }}" placeholder="{{ __('Period Date') }}" required />
            @error('period_date')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="is-active">{{ __('Is Active') }}</label>
            <input type="number" name="is_active" id="is-active" class="form-control @error('is_active') is-invalid @enderror" value="{{ isset($period) ? $period->is_active : old('is_active') }}" placeholder="{{ __('Is Active') }}" required />
            @error('is_active')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="category-id">{{ __('Category') }}</label>
            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select category') }} --</option>
                
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ isset($period) && $period->category_id == $category->id ? 'selected' : (old('category_id') == $category->id ? 'selected' : '') }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
            </select>
            @error('category_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>