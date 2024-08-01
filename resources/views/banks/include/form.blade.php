<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="bank-name">{{ __('Bank Name') }}</label>
            <input type="text" name="bank_name" id="bank-name" class="form-control @error('bank_name') is-invalid @enderror" value="{{ isset($bank) ? $bank->bank_name : old('bank_name') }}" placeholder="{{ __('Bank Name') }}" required />
            @error('bank_name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="rekening-number">{{ __('Rekening Number') }}</label>
            <input type="text" name="rekening_number" id="rekening-number" class="form-control @error('rekening_number') is-invalid @enderror" value="{{ isset($bank) ? $bank->rekening_number : old('rekening_number') }}" placeholder="{{ __('Rekening Number') }}" required />
            @error('rekening_number')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="rekening-name">{{ __('Rekening Name') }}</label>
            <input type="text" name="rekening_name" id="rekening-name" class="form-control @error('rekening_name') is-invalid @enderror" value="{{ isset($bank) ? $bank->rekening_name : old('rekening_name') }}" placeholder="{{ __('Rekening Name') }}" required />
            @error('rekening_name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    @isset($bank)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($bank->image == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Image" class="rounded mb-2 mt-2" alt="Image" width="200" height="150" style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/images/' . $bank->image) }}" alt="Image" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="form-group ms-3">
                        <label for="image">{{ __('Image') }}</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">

                        @error('image')
                          <span class="text-danger">
                                {{ $message }}
                           </span>
                        @enderror
                        <div id="imageHelpBlock" class="form-text">
                            {{ __('Leave the image blank if you don`t want to change it.') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-6">
            <div class="form-group">
                <label for="image">{{ __('Image') }}</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" required>

                @error('image')
                   <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
    @endisset
    <div class="col-md-6">
        <div class="form-group">
            <label for="is-active">{{ __('Is Active') }}</label>
            <input type="number" name="is_active" id="is-active" class="form-control @error('is_active') is-invalid @enderror" value="{{ isset($bank) ? $bank->is_active : old('is_active') }}" placeholder="{{ __('Is Active') }}" required />
            @error('is_active')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>