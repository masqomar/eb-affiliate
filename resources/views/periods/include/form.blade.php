<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="period-date">{{ __('Period Date') }}</label>
            <input type="date" name="period_date" id="period-date" class="form-control @error('period_date') is-invalid @enderror" value="{{ isset($period) && $period->period_date ? $period->period_date : old('period_date') }}" placeholder="{{ __('Period Date') }}" required />
            @error('period_date')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
   
    
    @isset($period)
    <div class="col-md-6">
        <div class="form-group">
            <label for="is-active">{{ __('Status') }}</label>
            <select class="form-select @error('is_active') is-invalid @enderror"name="is_active" id="is-active" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Pilihan') }} --</option>
                <option value="1" @selected(old('$period->is_active') ?? $period->is_active == 1)>Aktif</option>
                <option value="0" @selected(old('$period->is_active') ?? $period->is_active == 0)>Tidak Aktif</option>
            </select>
            @error('is_active')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    @else
    <div class="col-md-6">
        <div class="form-group">
            <label for="is-active">{{ __('Status') }}</label>
            <select class="form-select @error('is_active') is-invalid @enderror"name="is_active" id="is-active" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Status') }} --</option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
            @error('is_active')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    @endisset

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