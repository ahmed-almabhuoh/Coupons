<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{__('User created successfully')}}
            </div>
        </div>
    @endif

    <x-form.input name="fname" type="text" label="First name" placeholder="Enter the user first name here ...." />

    <x-form.input name="lname" type="text" label="Last name" placeholder="Enter the user last name here ...." />

    <x-form.input name="email" type="text" label="E-mail" placeholder="Enter the user E-mail here ...." />

    <x-form.input name="phone" type="text" label="Phone no." placeholder="Enter the user Phone no. here ...." />

    <x-form.input name="password" type="password" label="Password" placeholder="Enter the user Password here ...." />

    <x-form.input name="password_confirmation" type="password" label="Password Confirmation"
        placeholder="Enter the user Password Confirmation here ...." />

    <x-form.single-image name="image" label="User image" />

    <x-form.select name="status" label="Account status" :options="['active', 'disabled']" />

    <x-form.submit text="Store" action="store()" type="button" />
</div>
