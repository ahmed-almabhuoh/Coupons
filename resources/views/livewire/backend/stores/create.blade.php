<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Store created successfully') }}
            </div>
        </div>
    @endif

    <x-form.input name="name" type="text" label="Store name" placeholder="Enter the store name here ...." />

    <x-form.input name="action" type="url" label="Store URL" placeholder="Enter the store URL here ...." />

    <x-form.select name="status" label="Store status" :options="App\Models\Store::STATUS" />

    <x-form.single-image name="icon" label="Store icon (optional)" />

    <x-form.textarea name="description" label="description" placeholder="Enter the store description here ...." />

    <div>
        <x-form.submit text="Store" action="store()" type="button" />
    </div>
</div>
