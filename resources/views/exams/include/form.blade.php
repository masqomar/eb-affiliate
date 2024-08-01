<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="category-id">{{ __('Category') }}</label>
            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select category') }} --</option>
                
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ isset($exam) && $exam->category_id == $category->id ? 'selected' : (old('category_id') == $category->id ? 'selected' : '') }}>
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
            <label for="question-title-id">{{ __('Question Title') }}</label>
            <select class="form-select @error('question_title_id') is-invalid @enderror" name="question_title_id" id="question-title-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select question title') }} --</option>
                
                        @foreach ($questionTitles as $questionTitle)
                            <option value="{{ $questionTitle->id }}" {{ isset($exam) && $exam->question_title_id == $questionTitle->id ? 'selected' : (old('question_title_id') == $questionTitle->id ? 'selected' : '') }}>
                                {{ $questionTitle->category_id }}
                            </option>
                        @endforeach
            </select>
            @error('question_title_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="title">{{ __('Title') }}</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ isset($exam) ? $exam->title : old('title') }}" placeholder="{{ __('Title') }}" required />
            @error('title')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="price">{{ __('Price') }}</label>
            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ isset($exam) ? $exam->price : old('price') }}" placeholder="{{ __('Price') }}" required />
            @error('price')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="duration-type">{{ __('Duration Type') }}</label>
            <input type="number" name="duration_type" id="duration-type" class="form-control @error('duration_type') is-invalid @enderror" value="{{ isset($exam) ? $exam->duration_type : old('duration_type') }}" placeholder="{{ __('Duration Type') }}" required />
            @error('duration_type')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="duration">{{ __('Duration') }}</label>
            <input type="number" name="duration" id="duration" class="form-control @error('duration') is-invalid @enderror" value="{{ isset($exam) ? $exam->duration : old('duration') }}" placeholder="{{ __('Duration') }}" />
            @error('duration')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('Description') }}" required>{{ isset($exam) ? $exam->description : old('description') }}</textarea>
            @error('description')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="random-question">{{ __('Random Question') }}</label>
            <input type="number" name="random_question" id="random-question" class="form-control @error('random_question') is-invalid @enderror" value="{{ isset($exam) ? $exam->random_question : old('random_question') }}" placeholder="{{ __('Random Question') }}" required />
            @error('random_question')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="random-answer">{{ __('Random Answer') }}</label>
            <input type="number" name="random_answer" id="random-answer" class="form-control @error('random_answer') is-invalid @enderror" value="{{ isset($exam) ? $exam->random_answer : old('random_answer') }}" placeholder="{{ __('Random Answer') }}" required />
            @error('random_answer')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="show-answer">{{ __('Show Answer') }}</label>
            <input type="number" name="show_answer" id="show-answer" class="form-control @error('show_answer') is-invalid @enderror" value="{{ isset($exam) ? $exam->show_answer : old('show_answer') }}" placeholder="{{ __('Show Answer') }}" required />
            @error('show_answer')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="show-question-number-navigation">{{ __('Show Question Number Navigation') }}</label>
            <input type="number" name="show_question_number_navigation" id="show-question-number-navigation" class="form-control @error('show_question_number_navigation') is-invalid @enderror" value="{{ isset($exam) ? $exam->show_question_number_navigation : old('show_question_number_navigation') }}" placeholder="{{ __('Show Question Number Navigation') }}" required />
            @error('show_question_number_navigation')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="show-question-number">{{ __('Show Question Number') }}</label>
            <input type="number" name="show_question_number" id="show-question-number" class="form-control @error('show_question_number') is-invalid @enderror" value="{{ isset($exam) ? $exam->show_question_number : old('show_question_number') }}" placeholder="{{ __('Show Question Number') }}" required />
            @error('show_question_number')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="next-question-automatically">{{ __('Next Question Automatically') }}</label>
            <input type="number" name="next_question_automatically" id="next-question-automatically" class="form-control @error('next_question_automatically') is-invalid @enderror" value="{{ isset($exam) ? $exam->next_question_automatically : old('next_question_automatically') }}" placeholder="{{ __('Next Question Automatically') }}" required />
            @error('next_question_automatically')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="show-prev-next-button">{{ __('Show Prev Next Button') }}</label>
            <input type="number" name="show_prev_next_button" id="show-prev-next-button" class="form-control @error('show_prev_next_button') is-invalid @enderror" value="{{ isset($exam) ? $exam->show_prev_next_button : old('show_prev_next_button') }}" placeholder="{{ __('Show Prev Next Button') }}" required />
            @error('show_prev_next_button')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="type-option">{{ __('Type Option') }}</label>
            <input type="number" name="type_option" id="type-option" class="form-control @error('type_option') is-invalid @enderror" value="{{ isset($exam) ? $exam->type_option : old('type_option') }}" placeholder="{{ __('Type Option') }}" required />
            @error('type_option')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="total-tolerance">{{ __('Total Tolerance') }}</label>
            <input type="number" name="total_tolerance" id="total-tolerance" class="form-control @error('total_tolerance') is-invalid @enderror" value="{{ isset($exam) ? $exam->total_tolerance : old('total_tolerance') }}" placeholder="{{ __('Total Tolerance') }}" />
            @error('total_tolerance')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>