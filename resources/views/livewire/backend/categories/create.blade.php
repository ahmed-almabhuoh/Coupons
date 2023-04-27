<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Category created successfully') }}
            </div>
        </div>
    @endif

    <x-form.input name="name" type="text" label="Category name" placeholder="Enter the category name here ...." />

    <x-form.select name="status" label="Category status" :options="App\Models\Category::STATUS" />

    <x-form.single-image name="image" label="Category image" description="The image dimensions should be at max 100 X 100" />

    <div>
        <x-form.submit text="Store" action="store()" type="button" />
    </div>
</div>
