<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Password changed successfully') }}
            </div>
        </div>
    @endif

    <x-form.full-width-input name="current_password" type="password" label="Current Password"
        placeholder="Enter the current password here ...." />

    <x-form.full-width-input name="new_password" type="password" label="New Password"
        placeholder="Enter the new password here ...." />

    <x-form.full-width-input name="new_password_confirmation" type="password" label="Password Confirmation"
        placeholder="Enter the password confirmation here ...." />

    <div>
        <x-form.submit text="Change" action="changePassword()" type="button" />
    </div>
</div>
