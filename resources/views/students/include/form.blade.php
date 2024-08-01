<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="user-id">{{ __('User') }}</label>
            <select class="form-select @error('user_id') is-invalid @enderror" name="user_id" id="user-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select user') }} --</option>
                
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ isset($student) && $student->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
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
            <label for="province-id">{{ __('Province Id') }}</label>
            <input type="number" name="province_id" id="province-id" class="form-control @error('province_id') is-invalid @enderror" value="{{ isset($student) ? $student->province_id : old('province_id') }}" placeholder="{{ __('Province Id') }}" />
            @error('province_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="city-id">{{ __('City Id') }}</label>
            <input type="number" name="city_id" id="city-id" class="form-control @error('city_id') is-invalid @enderror" value="{{ isset($student) ? $student->city_id : old('city_id') }}" placeholder="{{ __('City Id') }}" />
            @error('city_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="district-id">{{ __('District Id') }}</label>
            <input type="number" name="district_id" id="district-id" class="form-control @error('district_id') is-invalid @enderror" value="{{ isset($student) ? $student->district_id : old('district_id') }}" placeholder="{{ __('District Id') }}" />
            @error('district_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="village-id">{{ __('Village Id') }}</label>
            <input type="number" name="village_id" id="village-id" class="form-control @error('village_id') is-invalid @enderror" value="{{ isset($student) ? $student->village_id : old('village_id') }}" placeholder="{{ __('Village Id') }}" />
            @error('village_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="address">{{ __('Address') }}</label>
            <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="{{ __('Address') }}">{{ isset($student) ? $student->address : old('address') }}</textarea>
            @error('address')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="phone-number">{{ __('Phone Number') }}</label>
            <input type="text" name="phone_number" id="phone-number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ isset($student) ? $student->phone_number : old('phone_number') }}" placeholder="{{ __('Phone Number') }}" required />
            @error('phone_number')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="gender">{{ __('Gender') }}</label>
            <select class="form-select @error('gender') is-invalid @enderror" name="gender" id="gender" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select gender') }} --</option>
                <option value="F" {{ isset($student) && $student->gender == 'F' ? 'selected' : (old('gender') == 'F' ? 'selected' : '') }}>F</option>
		<option value="M" {{ isset($student) && $student->gender == 'M' ? 'selected' : (old('gender') == 'M' ? 'selected' : '') }}>M</option>			
            </select>
            @error('gender')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="is-member">{{ __('Is Member') }}</label>
            <input type="number" name="is_member" id="is-member" class="form-control @error('is_member') is-invalid @enderror" value="{{ isset($student) ? $student->is_member : old('is_member') }}" placeholder="{{ __('Is Member') }}" required />
            @error('is_member')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="member-access">{{ __('Member Access') }}</label>
            <textarea name="member_access" id="member-access" class="form-control @error('member_access') is-invalid @enderror" placeholder="{{ __('Member Access') }}" required>{{ isset($student) ? $student->member_access : old('member_access') }}</textarea>
            @error('member_access')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>