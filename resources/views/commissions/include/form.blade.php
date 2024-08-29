<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="tenant-id">{{ __('Tenant') }}</label>
            <select class="form-select @error('tenant_id') is-invalid @enderror" name="tenant_id" id="tenant-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select tenant') }} --</option>
                
                        @foreach ($tenants as $tenant)
                            <option value="{{ $tenant->id }}" {{ isset($commission) && $commission->tenant_id == $tenant->id ? 'selected' : (old('tenant_id') == $tenant->id ? 'selected' : '') }}>
                                {{ $tenant->user_id }}
                            </option>
                        @endforeach
            </select>
            @error('tenant_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="amount">{{ __('Amount') }}</label>
            <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ isset($commission) ? $commission->amount : old('amount') }}" placeholder="{{ __('Amount') }}" required />
            @error('amount')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    @isset($commission)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($commission->commission_proof == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Commission Proof" class="rounded mb-2 mt-2" alt="Commission Proof" width="200" height="150" style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/commission_proofs/' . $commission->commission_proof) }}" alt="Commission Proof" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="form-group ms-3">
                        <label for="commission_proof">{{ __('Commission Proof') }}</label>
                        <input type="file" name="commission_proof" class="form-control @error('commission_proof') is-invalid @enderror" id="commission_proof">

                        @error('commission_proof')
                          <span class="text-danger">
                                {{ $message }}
                           </span>
                        @enderror
                        <div id="commission_proofHelpBlock" class="form-text">
                            {{ __('Leave the commission proof blank if you don`t want to change it.') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-6">
            <div class="form-group">
                <label for="commission_proof">{{ __('Commission Proof') }}</label>
                <input type="file" name="commission_proof" class="form-control @error('commission_proof') is-invalid @enderror" id="commission_proof" required>

                @error('commission_proof')
                   <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
    @endisset
    <div class="col-md-6">
        <div class="form-group">
            <label for="note">{{ __('Note') }}</label>
            <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror" placeholder="{{ __('Note') }}">{{ isset($commission) ? $commission->note : old('note') }}</textarea>
            @error('note')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>