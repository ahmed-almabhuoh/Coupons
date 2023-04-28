<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Store updated successfully') }}
            </div>
        </div>
    @endif

    <x-form.input name="code" type="text" label="Coupon Code" placeholder="Enter the coupon code here ...." />

    <x-form.input name="coupon" model="discount" type="number" label="Coupon Discount"
        placeholder="Enter the coupon value here ...." />

    <x-form.input name="url" model="url" type="url" label="Coupon URL"
        placeholder="Enter the coupon URL ...." />

    <x-form.select name="status" model="status" label="Coupon status" :options="App\Models\Coupon::STATUS" />

    <x-form.select name="category" model="category_id" label="Coupon Category" :options="$categories" />

    <x-form.select name="store" model="store_id" label="Coupon Store" :options="$stores" />

    <x-form.input name="coupon" model="duration" type="number" label="Coupon Days"
        placeholder="Enter the coupon duration days here ...."
        desc="Let the input value 0, if you need to make this coupon available always" />

    <div class="col-sm-12 col-12  py-1">
        <label class="form-label" for="fp-default">Customize Coupon Date</label>
        <input type="text" id="fp-default" wire:model="cusDate" class="form-control flatpickr-basic flatpickr-input"
            placeholder="YYYY-MM-DD" readonly="readonly">
    </div>

    <x-form.textarea name="description" label="Coupons Description"
        placeholder="Enter the coupon description here ...." />

    <div>
        <x-form.submit text="Update" action="update()" type="button" />
    </div>
</div>
