<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Nama Program') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($program) ? $program->name : old('name') }}" placeholder="{{ __('Name') }}" required />
            @error('name')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="price">{{ __('Biaya') }}</label>
            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ isset($program) ? $program->price : old('price') }}" placeholder="{{ __('Price') }}" required />
            @error('price')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    @isset($program)
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-4 text-center">
                @if ($program->image == null)
                <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Image" class="rounded mb-2 mt-2" alt="Image" width="200" height="150" style="object-fit: cover">
                @else
                <img src="{{ asset('storage/uploads/images/' . $program->image) }}" alt="Image" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
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
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">

            @error('image')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    @endisset

    @isset($program)
    <div class="col-md-6">
        <div class="form-group">
            <label for="is-active">{{ __('Status') }}</label>
            <select class="form-select @error('is_active') is-invalid @enderror"name="is_active" id="is-active" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Pilihan') }} --</option>
                <option value="1" @selected(old('$program->is_active') ?? $program->is_active == 1)>Aktif</option>
                <option value="0" @selected(old('$program->is_active') ?? $program->is_active == 0)>Tidak Aktif</option>
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
            <label for="program-type-id">{{ __('Jenis Program') }}</label>
            <select class="form-select @error('program_type_id') is-invalid @enderror" name="program_type_id" id="program-type-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Pilihan') }} --</option>

                @foreach ($programTypes as $programType)
                @if ($programType->category->name == 'Kelas Offline')
                <option value="{{ $programType->id }}" {{ isset($program) && $program->program_type_id == $programType->id ? 'selected' : (old('program_type_id') == $programType->id ? 'selected' : '') }}>
                    {{ $programType->name }}
                </option>
                @endif
                @endforeach
            </select>
            @error('program_type_id')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="program-type-id">{{ __('Periode') }}</label>
            <div class="card border">
                <div class="card-content">
                    <div class="card-body">
                        @foreach ($periods as $period)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="periods[]" value="{{ $period->id }}" />
                            <label class="form-check-label">
                                {{ $period->period_date }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>