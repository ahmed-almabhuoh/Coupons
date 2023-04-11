<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Artical updated successfully') }}
            </div>
        </div>
    @endif

    @if ($artical->image)
        <div class="card-body text-center">
            <img src="{{ env('APP_URL') . 'content/' . $this->artical->image }}" class="img-thumbnail mb-3"
                alt="Category image" width="250px" height="250px">
        </div>
    @endif

    <x-form.textarea name="description" label="description" placeholder="Enter the store description here ...." />

    <x-form.select name="blog" model="blog_id" label="Blog" :options="$blogs" />

    <x-form.select name="status" model="status" label="Offer status" :options="App\Models\Artical::STATUS" />

    <x-form.single-image name="image" model="image" label="Blog image" />

    <div>
        <x-form.submit text="Update" action="update()" type="button" />
    </div>
</div>
