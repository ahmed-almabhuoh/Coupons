<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Product updated successfully') }}
            </div>
        </div>
    @endif

    @if ($product->image)
        <div class="card-body text-center">
            <img src="{{ env('APP_URL') . 'content/' . $this->product->image }}" class="img-thumbnail mb-3"
                alt="Category image" width="250px" height="250px">
        </div>
    @endif

    <x-form.input name="name" type="text" label="Product Name" placeholder="Enter the product name here ...." />

    <x-form.input name="price" model="price" type="number" label="Product Price"
        placeholder="Enter the product price here ...." />

    <x-form.select name="category" model="category_id" label="Product Category" :options="$categories" />

    <x-form.select name="store" model="store_id" label="Product Store" :options="$stores" />

    <x-form.select name="coupon" model="coupon_id" label="Product Store" :options="$stores" />

    <x-form.single-image name="image" label="Product image" />

    <div>
        <x-form.submit text="Update" action="update()" type="button" />
    </div>
</div>
