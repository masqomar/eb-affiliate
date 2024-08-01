<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($category) ? $category->name : old('name') }}" placeholder="{{ __('Name') }}" required />
            @error('name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    @isset($category)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($category->thumbnail == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Thumbnail" class="rounded mb-2 mt-2" alt="Thumbnail" width="200" height="150" style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/thumbnails/' . $category->thumbnail) }}" alt="Thumbnail" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="form-group ms-3">
                        <label for="thumbnail">{{ __('Thumbnail') }}</label>
                        <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail">

                        @error('thumbnail')
                          <span class="text-danger">
                                {{ $message }}
                           </span>
                        @enderror
                        <div id="thumbnailHelpBlock" class="form-text">
                            {{ __('Leave the thumbnail blank if you don`t want to change it.') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-6">
            <div class="form-group">
                <label for="thumbnail">{{ __('Thumbnail') }}</label>
                <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail">

                @error('thumbnail')
                   <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
    @endisset
</div>