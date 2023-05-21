<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Country updated successfully') }}
            </div>
        </div>
    @endif

    @if ($country->image)
        <div class="card-body text-center">
            <img src="{{ env('APP_URL') . 'content/' . $this->country->image }}" class="img-thumbnail mb-3"
                alt="Country image" width="250px" height="250px">
        </div>
    @endif

    <x-form.input name="name" type="text" label="Country name" placeholder="Enter the country name here ...." />

    <x-form.select name="status" label="Country status" :options="App\Models\Country::STATUS" />

    <x-form.single-image name="image" label="Country image (optional)" />

    <div>
        <x-form.submit text="Update" action="update()" type="button" />
    </div>
</div>
