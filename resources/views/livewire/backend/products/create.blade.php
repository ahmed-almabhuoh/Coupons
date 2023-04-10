<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Product created successfully') }}
            </div>
        </div>
    @endif

    <x-form.input name="name" type="text" label="Product Name" placeholder="Enter the product name here ...." />

    <x-form.input name="price" model="price" type="number" label="Product Price"
        placeholder="Enter the product price here ...." />

    <x-form.select name="category" model="category_id" label="Product Category" :options="$categories" />

    <x-form.select name="store" model="store_id" label="Product Store" :options="$stores" />

    <x-form.select name="coupon" model="coupon_id" label="Product Coupon (Optional)" :options="$coupons" />

    <x-form.multi-image name="images" label="Product image" />

    <div>
        <x-form.submit text="Store" action="store()" type="button" />
    </div>
</div>
