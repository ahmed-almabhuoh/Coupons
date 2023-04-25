<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Store updated successfully') }}
            </div>
        </div>
    @endif

    @if ($store->icon)
        <div class="card-body text-center">
            <img src="{{ env('APP_URL') . 'content/' . $this->store->icon }}" class="img-thumbnail mb-3"
                alt="Store icon" width="250px" height="250px">
        </div>
    @endif

    <x-form.input name="name" type="text" label="Store name" placeholder="Enter the store name here ...." />

    <x-form.input name="action" type="url" label="Store URL" placeholder="Enter the store URL here ...." />

    <x-form.select name="status" label="Store status" :options="App\Models\Store::STATUS" />

    <x-form.single-image name="icon" label="Store icon (optional)" />

    <x-form.textarea name="description" label="Description" placeholder="Enter the store description here ...." />

    <div>
        <x-form.submit text="Store" action="update()" type="button" />
    </div>
</div>
