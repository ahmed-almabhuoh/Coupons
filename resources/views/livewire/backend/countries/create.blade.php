<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Country created successfully') }}
            </div>
        </div>
    @endif

    <x-form.input name="name" type="text" label="Country name" placeholder="Enter the country name here ...." />

    <x-form.select name="status" label="Country status" :options="App\Models\Country::STATUS" />

    <x-form.single-image name="image" label="Country image" description="The image dimensions should be at max 100 X 100" />

    <div>
        <x-form.submit text="Store" action="store()" type="button" />
    </div>
</div>
