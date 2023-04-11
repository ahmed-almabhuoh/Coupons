<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Offer created successfully') }}
            </div>
        </div>
    @endif

    <x-form.input name="title" type="text" label="Offer title" placeholder="Enter the offer title here ...." />

    <x-form.input name="btn_txt" type="text" label="Offer BTN TXT" placeholder="Enter the offer BTN TXT here ...." />

    <x-form.input name="btn_action" type="url" label="Offer BTN action" placeholder="Enter the offer BTN action here ...." />

    <x-form.select name="status" model="status" label="Offer status" :options="App\Models\Offer::STATUS" />

    <x-form.single-image name="image" model="image" label="Offer image" />

    <div>
        <x-form.submit text="Store" action="store()" type="button" />
    </div>
</div>
