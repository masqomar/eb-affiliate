<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="category-id">{{ __('Category') }}</label>
            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select category') }} --</option>
                
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ isset($valueCategory) && $valueCategory->category_id == $category->id ? 'selected' : (old('category_id') == $category->id ? 'selected' : '') }}>
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
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($valueCategory) ? $valueCategory->name : old('name') }}" placeholder="{{ __('Name') }}" required />
            @error('name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="assessment-type">{{ __('Assessment Type') }}</label>
            <input type="number" name="assessment_type" id="assessment-type" class="form-control @error('assessment_type') is-invalid @enderror" value="{{ isset($valueCategory) ? $valueCategory->assessment_type : old('assessment_type') }}" placeholder="{{ __('Assessment Type') }}" required />
            @error('assessment_type')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="section">{{ __('Section') }}</label>
            <input type="number" name="section" id="section" class="form-control @error('section') is-invalid @enderror" value="{{ isset($valueCategory) ? $valueCategory->section : old('section') }}" placeholder="{{ __('Section') }}" required />
            @error('section')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>