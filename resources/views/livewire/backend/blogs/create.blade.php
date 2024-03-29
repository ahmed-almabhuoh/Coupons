<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Blog created successfully') }}
            </div>
        </div>
    @endif

    <x-form.input name="title" type="text" label="Blog title" placeholder="Enter the blog title here ...." />

    <x-form.select name="status" model="status" label="Blog status" :options="App\Models\Blog::STATUS" />

    <x-form.select name="category_id" model="category_id" label="Blog Category" :options="$categories" />

    <x-form.select name="store_id" model="store_id" label="Blog Store" :options="$stores" />

    <x-form.single-image name="image" model="image" label="Blog image" />

    <div>
        <x-form.submit text="Store" action="store()" type="button" />
    </div>
</div>
