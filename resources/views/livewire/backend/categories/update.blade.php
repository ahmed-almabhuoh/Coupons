<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Category updated successfully') }}
            </div>
        </div>
    @endif

    <div class="card-body text-center">
        <img src="{{ env('APP_URL') . 'content/' . $this->category->image }}" class="img-thumbnail mb-3" alt="Category image"
            width="250px" height="250px">
    </div>

    <x-form.input name="name" type="text" label="Category name" placeholder="Enter the category name here ...." />

    <x-form.select name="status" label="Category status" :options="App\Models\Category::STATUS" />

    <x-form.single-image name="image" label="Category image (optional)" />

    <div>
        <x-form.submit text="Update" action="update()" type="button" />
    </div>
</div>
