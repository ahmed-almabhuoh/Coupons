<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Offer created successfully') }}
            </div>
        </div>
    @endif

    {{-- <x-form.input name="title" type="text" label="Offer title" placeholder="Enter the offer title here ...." /> --}}

    {{-- <x-form.input name="btn_txt" type="text" label="Offer BTN TXT" placeholder="Enter the offer BTN TXT here ...." /> --}}

    <x-form.input name="btn_action" type="url" label="Offer URL" placeholder="Enter the offer action here ...." />

    <x-form.select name="status" model="status" label="Offer status" :options="App\Models\Offer::STATUS" />

    <x-form.single-image name="image" model="image" label="Offer image" description="468 x 60 (banner), 728 x 90 (leaderboard banner), 250 x 250 (square) and 120 x 600 (skyscraper)" />

    <div>
        <x-form.submit text="Update" action="update()" type="button" />
    </div>
</div>
