<form>
    @if ($showMessage)
        <div class="alert alert-primary" role="alert">
            {{ __($showMessage) }}
        </div>
    @endif
    <div class="form-group">
        <div class="first-last">
            <label for="name">{{ __('Full Name') }}</label>
            <input type="text" name="fullname" wire:model="fullname" id="fullname" class="first form-control"
                style="@error('fullname')
            border-color: rgb(230, 22, 22);
            @enderror"
                name="name" required autofocus>
            @error('fullname')
                <div style="color: rgb(230, 22, 22);">{{ __($message) }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="email"> {{ __('E-Mail Address') }} </label>
        <input wire:model="email" type="email" class="form-control" name="email"
            style="@error('email')
        border-color: rgb(230, 22, 22);
        @enderror" required>
        @error('email')
            <div style="color: rgb(230, 22, 22);">{{ __($message) }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password"> {{ __('Password') }} </label>
        <input id="password" type="password" wire:model="password" name="password" class="form-control"
            style="@error('password')
        border-color: rgb(230, 22, 22);
        @enderror" name="password"
            required data-eye>
        @error('password')
            <div style="color: rgb(230, 22, 22);">{{ __($message) }}</div>
        @enderror
        <!-- <span class="eye"><i class=" fa fa-eye-slash" id="togglePassword"></i></span> -->
        <span toggle="#password" class="toggle-password fa fa-fw fa-eye"></span>
    </div>
    <div class="form-group no-margin">
        <button type="button" wire:click="register" class="btn btn-primary btn-block">
            {{ __('Register') }}
        </button>
    </div>
    <div class="text-link margin-top20 text-center">
        {{ __('Already have an account?') }} <a href="{{ route('users.login') }}"> {{ __('Login') }} </a>
    </div>
</form>


@push('scripts')
    <script>
        function validateEmail(email) {
            const regex = /\S+@\S+\.\S+/;
            return regex.test(email);
        }
    </script>
@endpush
