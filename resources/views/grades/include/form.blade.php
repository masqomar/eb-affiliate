<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="category-id">{{ __('Category') }}</label>
            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select category') }} --</option>
                
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ isset($grade) && $grade->category_id == $category->id ? 'selected' : (old('category_id') == $category->id ? 'selected' : '') }}>
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
            <label for="exam-id">{{ __('Exam') }}</label>
            <select class="form-select @error('exam_id') is-invalid @enderror" name="exam_id" id="exam-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select exam') }} --</option>
                
                        @foreach ($exams as $exam)
                            <option value="{{ $exam->id }}" {{ isset($grade) && $grade->exam_id == $exam->id ? 'selected' : (old('exam_id') == $exam->id ? 'selected' : '') }}>
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
            <label for="user-id">{{ __('User') }}</label>
            <select class="form-select @error('user_id') is-invalid @enderror" name="user_id" id="user-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select user') }} --</option>
                
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ isset($grade) && $grade->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
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
            <label for="duration">{{ __('Duration') }}</label>
            <input type="number" name="duration" id="duration" class="form-control @error('duration') is-invalid @enderror" value="{{ isset($grade) ? $grade->duration : old('duration') }}" placeholder="{{ __('Duration') }}" required />
            @error('duration')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="number">{{ __('Number') }}</label>
            <input type="number" name="number" id="number" class="form-control @error('number') is-invalid @enderror" value="{{ isset($grade) ? $grade->number : old('number') }}" placeholder="{{ __('Number') }}" required />
            @error('number')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="section">{{ __('Section') }}</label>
            <input type="number" name="section" id="section" class="form-control @error('section') is-invalid @enderror" value="{{ isset($grade) ? $grade->section : old('section') }}" placeholder="{{ __('Section') }}" required />
            @error('section')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="total-section">{{ __('Total Section') }}</label>
            <input type="number" name="total_section" id="total-section" class="form-control @error('total_section') is-invalid @enderror" value="{{ isset($grade) ? $grade->total_section : old('total_section') }}" placeholder="{{ __('Total Section') }}" required />
            @error('total_section')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="start-time">{{ __('Start Time') }}</label>
            <input type="datetime-local" name="start_time" id="start-time" class="form-control @error('start_time') is-invalid @enderror" value="{{ isset($grade) && $grade->start_time ? $grade->start_time->format('Y-m-d\TH:i') : old('start_time') }}" placeholder="{{ __('Start Time') }}" />
            @error('start_time')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="end-time">{{ __('End Time') }}</label>
            <input type="datetime-local" name="end_time" id="end-time" class="form-control @error('end_time') is-invalid @enderror" value="{{ isset($grade) && $grade->end_time ? $grade->end_time->format('Y-m-d\TH:i') : old('end_time') }}" placeholder="{{ __('End Time') }}" />
            @error('end_time')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="total-correct">{{ __('Total Correct') }}</label>
            <input type="number" name="total_correct" id="total-correct" class="form-control @error('total_correct') is-invalid @enderror" value="{{ isset($grade) ? $grade->total_correct : old('total_correct') }}" placeholder="{{ __('Total Correct') }}" required />
            @error('total_correct')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="grade-old">{{ __('Grade Old') }}</label>
            <input type="number" name="grade_old" id="grade-old" class="form-control @error('grade_old') is-invalid @enderror" value="{{ isset($grade) ? $grade->grade_old : old('grade_old') }}" placeholder="{{ __('Grade Old') }}" required />
            @error('grade_old')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="grade">{{ __('Grade') }}</label>
            <input type="number" name="grade" id="grade" class="form-control @error('grade') is-invalid @enderror" value="{{ isset($grade) ? $grade->grade : old('grade') }}" placeholder="{{ __('Grade') }}" required />
            @error('grade')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="answers">{{ __('Answers') }}</label>
            <textarea name="answers" id="answers" class="form-control @error('answers') is-invalid @enderror" placeholder="{{ __('Answers') }}">{{ isset($grade) ? $grade->answers : old('answers') }}</textarea>
            @error('answers')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="is-finished">{{ __('Is Finished') }}</label>
            <input type="number" name="is_finished" id="is-finished" class="form-control @error('is_finished') is-invalid @enderror" value="{{ isset($grade) ? $grade->is_finished : old('is_finished') }}" placeholder="{{ __('Is Finished') }}" required />
            @error('is_finished')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="total-tolerance">{{ __('Total Tolerance') }}</label>
            <input type="number" name="total_tolerance" id="total-tolerance" class="form-control @error('total_tolerance') is-invalid @enderror" value="{{ isset($grade) ? $grade->total_tolerance : old('total_tolerance') }}" placeholder="{{ __('Total Tolerance') }}" required />
            @error('total_tolerance')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="is-blocked">{{ __('Is Blocked') }}</label>
            <input type="number" name="is_blocked" id="is-blocked" class="form-control @error('is_blocked') is-invalid @enderror" value="{{ isset($grade) ? $grade->is_blocked : old('is_blocked') }}" placeholder="{{ __('Is Blocked') }}" required />
            @error('is_blocked')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>