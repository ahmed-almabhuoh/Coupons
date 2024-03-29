<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Admin created successfully') }}
            </div>
        </div>
    @endif

    <x-form.input name="fname" type="text" label="First name" placeholder="Enter the admin first name here ...." />

    <x-form.input name="lname" type="text" label="Last name" placeholder="Enter the admin last name here ...." />

    <x-form.input name="email" type="text" label="E-mail" placeholder="Enter the admin E-mail here ...." />

    <x-form.input name="phone" type="text" label="Phone no." placeholder="Enter the admin Phone no. here ...." />

    <x-form.input name="password" type="password" label="Password" placeholder="Enter the admin Password here ...." />

    <x-form.input name="password_confirmation" type="password" label="Password Confirmation"
        placeholder="Enter the admin Password Confirmation here ...." />

    <x-form.single-image name="image" label="Admin image" />

    <x-form.select name="status" label="Account status" :options="['active', 'disabled']" />

    <x-form.select name="role_id" label="Admin role" :options="$roles" />

    <div>
        <x-form.submit text="Store" action="store()" type="button" />
    </div>
</div>
