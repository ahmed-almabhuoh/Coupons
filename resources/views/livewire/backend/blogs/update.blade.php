<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Blog updated successfully') }}
            </div>
        </div>
    @endif

    @if ($blog->image)
        <div class="card-body text-center">
            <img src="{{ env('APP_URL') . 'content/' . $this->blog->image }}" class="img-thumbnail mb-3"
                alt="Category image" width="250px" height="250px">
        </div>
    @endif

    <x-form.input name="title" type="text" label="Blog title" placeholder="Enter the blog title here ...." />

    <x-form.single-image name="image" model="image" label="Blog image" />

    <div>
        <x-form.submit text="Update" action="update()" type="button" />
    </div>
</div>
