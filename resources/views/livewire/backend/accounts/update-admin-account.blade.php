<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Account updated successfully') }}
            </div>
        </div>
    @endif

    @if ($user->image)
        <div class="card-body text-center">
            <img src="{{ env('APP_URL') . 'human/' . $this->user->image }}" class="img-thumbnail mb-3" alt="User image"
                width="250px" height="250px">
        </div>
    @endif

    <x-form.input name="fname" type="text" label="First name" placeholder="Enter your first name here ...." />

    <x-form.input name="lname" type="text" label="Last name" placeholder="Enter your last name here ...." />

    <x-form.input name="email" type="text" label="E-mail" placeholder="Enter your E-mail here ...." />

    <x-form.input name="phone" type="text" label="Phone no." placeholder="Enter your Phone no. here ...." />

    <x-form.single-image name="image" label="Choose your image" />

    <div>
        <x-form.submit text="Update" action="update()" type="button" />
    </div>
</div>
