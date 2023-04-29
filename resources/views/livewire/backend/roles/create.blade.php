<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Role created successfully') }}
            </div>
        </div>
    @endif

    <x-form.input name="name" type="text" label="Role name" placeholder="Enter the role name here ...." />

    <div>
        <x-form.submit text="Store" action="store()" type="button" />
    </div>
</div>
