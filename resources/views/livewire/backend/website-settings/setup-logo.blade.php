<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Logo added successfully') }}
            </div>
        </div>
    @endif

    <x-form.single-image name="image" label="Logo" mode="image" />

    <div class="col-lg-6 col-md-12 mb-1 mb-sm-0 py-1">
        <label for="color" class="form-label">{{ __('Primary Color') }}</label>
        <input type="color" id="color" wire:model="color" class="form-control" style="height: 40px;">
    </div>

    <div>
        <div class="form-check col-lg-6 col-md-12 mb-1 mb-sm-0 py-1">
            <input class="form-check-input" wire:model="is_shown" type="checkbox" id="is_shown">
            <label class="form-check-label" for="is_shown"> {{ __('Show Languages Items?') }} </label>
        </div>
        @error('is_shown')
            <span style="color: red;">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div>
        <div class="form-check col-lg-6 col-md-12 mb-1 mb-sm-0 py-1">
            <input class="form-check-input" wire:model="show_store_items" type="checkbox" id="show_store_items">
            <label class="form-check-label" for="show_store_items"> {{ __('Show stores items.') }} </label>
        </div>
        @error('show_store_items')
            <span style="color: red;">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div>
        <x-form.submit text="Store" action="store()" type="button" />
    </div>
</div>
