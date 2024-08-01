<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="value-category-id">{{ __('Value Category') }}</label>
            <select class="form-select @error('value_category_id') is-invalid @enderror" name="value_category_id" id="value-category-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select value category') }} --</option>
                
                        @foreach ($valueCategories as $valueCategory)
                            <option value="{{ $valueCategory->id }}" {{ isset($detailValueCategory) && $detailValueCategory->value_category_id == $valueCategory->id ? 'selected' : (old('value_category_id') == $valueCategory->id ? 'selected' : '') }}>
                                {{ $valueCategory->category_id }}
                            </option>
                        @endforeach
            </select>
            @error('value_category_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="min-grade">{{ __('Min Grade') }}</label>
            <input type="number" name="min_grade" id="min-grade" class="form-control @error('min_grade') is-invalid @enderror" value="{{ isset($detailValueCategory) ? $detailValueCategory->min_grade : old('min_grade') }}" placeholder="{{ __('Min Grade') }}" required />
            @error('min_grade')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="max-grade">{{ __('Max Grade') }}</label>
            <input type="number" name="max_grade" id="max-grade" class="form-control @error('max_grade') is-invalid @enderror" value="{{ isset($detailValueCategory) ? $detailValueCategory->max_grade : old('max_grade') }}" placeholder="{{ __('Max Grade') }}" required />
            @error('max_grade')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="final-grade">{{ __('Final Grade') }}</label>
            <input type="number" name="final_grade" id="final-grade" class="form-control @error('final_grade') is-invalid @enderror" value="{{ isset($detailValueCategory) ? $detailValueCategory->final_grade : old('final_grade') }}" placeholder="{{ __('Final Grade') }}" required />
            @error('final_grade')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>