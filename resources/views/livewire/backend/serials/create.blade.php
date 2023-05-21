<div class="row">
    @if ($showSuccess)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('Success') }}</h4>
            <div class="alert-body">
                {{ __('Serial created successfully') }}
            </div>
        </div>
    @endif

    <div>
        <button class="btn btn-primary waves-effect waves-float waves-light"
            wire:click="generate">{{ __('Generate a random data') }}</button>
    </div>

    <x-form.input name="email" type="email" label="Email" placeholder="Enter the email to receive the license ..." />

    <x-form.input name="username" type="string" label="License username" placeholder="Enter the username here .." />

    <x-form.input name="password" type="string" label="License password" placeholder="Enter the password here ...." />

    <x-form.input name="serial" type="string" label="License serial"
        placeholder="Enter the license serial here ...." />

    <div>
        <x-form.submit text="Store" action="store()" type="button" />
    </div>
</div>
