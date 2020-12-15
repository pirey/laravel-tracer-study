<div class="container mt-3">
    <div class="row">
        <div class="col-6">
            <h2>{{ __('Tracer Study Submission') }}</h2>
            @if ($successMessage)
                <div class="alert alert-success dismissable">{{ $successMessage }}</div>
            @endif
            <form wire:submit.prevent="submit">
                <div class="mb-3">
                    <label class="form-label">{{ __('Name') }}</label>
                    <input wire:model="name" class="form-control @error('name') is-invalid @enderror" name="name" />
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Currently Working?') }}</label>
                    <div>
                        <label>
                            <input wire:model="currently_working" type="radio" name="currently_working" value="1" class="@error('currently_working') is-invalid @enderror" /> <span>{{ __('Yes') }}</span>
                        </label>
                        &nbsp;
                        <label>
                            <input wire:model="currently_working" type="radio" name="currently_working" value="0" class="@error('currently_working') is-invalid @enderror" /> <span>{{ __('No') }}</span>
                        </label>
                        @error('currently_working')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @if ($currently_working == true)
                    <div class="mb-3">
                        <label class="form-label">{{ __('Occupation') }}</label>
                        <input wire:model="occupation" class="form-control @error('occupation') is-invalid @enderror" name="occupation" />
                        @error('occupation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endif
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
