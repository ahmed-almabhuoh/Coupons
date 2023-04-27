<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Logo added successfully') }}
            </div>
        </div>
    @endif

    <x-form.single-image name="image" label="Logo" />

    <div>
        <div class="form-check col-lg-6 col-md-12 mb-1 mb-sm-0 py-1">
            <input class="form-check-input" wire:model="is_shown" type="checkbox" id="is_shown">
            <label class="form-check-label" for="is_shown"> {{ __('Show Languages Items?') }} </label>
        </div>
    </div>

    <div>
        <x-form.submit text="Store" action="store()" type="button" />
    </div>
</div>
