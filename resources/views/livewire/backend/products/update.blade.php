<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Product updated successfully') }}
            </div>
        </div>
    @endif

    <x-form.input name="name" type="text" label="Product Name" placeholder="Enter the product name here ...." />

    {{-- <x-form.input name="price" model="price" type="number" label="Product Price"
        placeholder="Enter the product price here ...." /> --}}
    @if (!$this->use_it_as_price)
        <x-form.input name="price" model="price" type="number" label="Product Price"
            placeholder="Enter the product price here ...." />
    @endif

    <x-form.input name="action" model="action" type="url" label="Product Link"
        placeholder="Enter the product link here ...." />

    <x-form.select name="category" model="category_id" label="Product Category" :options="$categories" />

    <x-form.select name="store" model="store_id" label="Product Store" :options="$stores" />

    {{-- <x-form.select name="coupon" model="coupon_id" label="Product Coupon" :options="$coupons" /> --}}

    <x-form.input name="coupon_code" model="coupon_code" type="text" label="Product Code (optional)"
        placeholder="Enter the product code here ...." />

    <x-form.multi-image name="images" label="Product images" />

    {{-- <x-form.input name="offer" type="number" label="Product Offer" placeholder="Enter the product offer here ...."
        min="0" max="100" /> --}}

    <div>
        <x-form.input name="offer" type="number" label="Price/Offer" placeholder="Enter the product offer here ...."
            min="0" max="100" />

        <div>
            <div class="form-check">
                <input class="form-check-input" wire:model="use_it_as_price" type="checkbox" id="use_it_as_price">
                <label class="form-check-label" for="use_it_as_price"> {{ __('Make it as price?') }} </label>
            </div>
        </div>
    </div>

    <x-form.input name="duration" model="duration" type="number" label="Product Days"
        placeholder="Enter the product duration days here ...."
        desc="Let the input value 0, if you need to make this coupon available always" />

    <div class="col-sm-12 col-12  py-1">
        <label class="form-label" for="fp-default"> {{ __('Customize Product Date') }} </label>
        <input type="text" id="fp-default" wire:model="cusDate" class="form-control flatpickr-basic flatpickr-input"
            placeholder="YYYY-MM-DD" readonly="readonly">
    </div>


    <x-form.textarea name="description" label="Product Description"
        placeholder="Enter the product description here ...." />

    <div>
        <div class="form-check">
            <input class="form-check-input" wire:model="specail" type="checkbox" id="specail">
            <label class="form-check-label" for="specail"> {{ __('Mark as a specail offer?') }} </label>
        </div>
        @error('cusDate')
            <small style="color: red;">{{ $message }}</small>
        @enderror
    </div>

    <div>
        <x-form.submit text="Update" action="update()" type="button" />
    </div>
</div>
