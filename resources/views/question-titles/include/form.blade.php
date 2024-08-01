<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="category-id">{{ __('Category') }}</label>
            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select category') }} --</option>
                
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ isset($questionTitle) && $questionTitle->category_id == $category->id ? 'selected' : (old('category_id') == $category->id ? 'selected' : '') }}>
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
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($questionTitle) ? $questionTitle->name : old('name') }}" placeholder="{{ __('Name') }}" required />
            @error('name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="total-choice">{{ __('Total Choices') }}</label>
            <input type="number" name="total_choices" id="total-choice" class="form-control @error('total_choices') is-invalid @enderror" value="{{ isset($questionTitle) ? $questionTitle->total_choices : old('total_choices') }}" placeholder="{{ __('Total Choices') }}" required />
            @error('total_choices')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="total-section">{{ __('Total Section') }}</label>
            <input type="number" name="total_section" id="total-section" class="form-control @error('total_section') is-invalid @enderror" value="{{ isset($questionTitle) ? $questionTitle->total_section : old('total_section') }}" placeholder="{{ __('Total Section') }}" required />
            @error('total_section')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="add-value-category">{{ __('Add Value Category') }}</label>
            <input type="number" name="add_value_category" id="add-value-category" class="form-control @error('add_value_category') is-invalid @enderror" value="{{ isset($questionTitle) ? $questionTitle->add_value_category : old('add_value_category') }}" placeholder="{{ __('Add Value Category') }}" required />
            @error('add_value_category')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="assessment-type">{{ __('Assessment Type') }}</label>
            <input type="number" name="assessment_type" id="assessment-type" class="form-control @error('assessment_type') is-invalid @enderror" value="{{ isset($questionTitle) ? $questionTitle->assessment_type : old('assessment_type') }}" placeholder="{{ __('Assessment Type') }}" required />
            @error('assessment_type')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="show-answer">{{ __('Show Answer') }}</label>
            <input type="number" name="show_answer" id="show-answer" class="form-control @error('show_answer') is-invalid @enderror" value="{{ isset($questionTitle) ? $questionTitle->show_answer : old('show_answer') }}" placeholder="{{ __('Show Answer') }}" required />
            @error('show_answer')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="minimum-grade">{{ __('Minimum Grade') }}</label>
            <input type="number" name="minimum_grade" id="minimum-grade" class="form-control @error('minimum_grade') is-invalid @enderror" value="{{ isset($questionTitle) ? $questionTitle->minimum_grade : old('minimum_grade') }}" placeholder="{{ __('Minimum Grade') }}" />
            @error('minimum_grade')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>