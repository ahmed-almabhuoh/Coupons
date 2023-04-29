<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Role updated successfully') }}
            </div>
        </div>
    @endif

    <x-form.input name="name" type="text" label="Role name" placeholder="Enter the role name here ...." />

    <div>
        <x-form.submit text="Update" action="update()" type="button" />
    </div>
</div>
