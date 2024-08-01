<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="question">{{ __('Question') }}</label>
            <input type="text" name="question" id="question" class="form-control @error('question') is-invalid @enderror" value="{{ isset($faq) ? $faq->question : old('question') }}" placeholder="{{ __('Question') }}" required />
            @error('question')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="answer">{{ __('Answer') }}</label>
            <textarea name="answer" id="answer" class="form-control @error('answer') is-invalid @enderror" placeholder="{{ __('Answer') }}" required>{{ isset($faq) ? $faq->answer : old('answer') }}</textarea>
            @error('answer')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>