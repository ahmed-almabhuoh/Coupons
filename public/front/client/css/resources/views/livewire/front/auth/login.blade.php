<form>

    @if ($messageStatus == 'error')
        <div class="alert alert-danger" role="alert">
            {{ __($showMessage) }}
        </div>
    @elseif ($messageStatus == 'success')
        <div class="alert alert-primary" role="alert">
            {{ __($showMessage) }}
        </div>
    @endif

    <div class="form-group">
        <label for="email"> {{ __('E-Mail Address') }} </label>
        <input id="email" type="email" class="form-control" name="email" wire:model="email" value="" required
            style="@error('email')
        border-color: rgb(230, 22, 22);
        @enderror" autofocus>
        @error('email')
            <div style="color: rgb(230, 22, 22);">{{ __($message) }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">
            {{ __('Password') }}
        </label>
        <input id="password" type="password" class="form-control" name="password" required wire:model="password"
            style="@error('password')
        border-color: rgb(230, 22, 22);
        @enderror" data-eye>
        <span toggle="#password" class="toggle-password fa fa-fw fa-eye"></span>
        @error('password')
            <div style="color: rgb(230, 22, 22);">{{ __($message) }}</div>
        @enderror
    </div>

    <div class="form-group no-margin">
        <button type="button" wire:click="login" class="btn btn-primary btn-block">
            {{ __('Login') }}
        </button>
    </div>

    <div class="text-link  margin-top20 text-center">
        {{ __('Don\'t have an account?..') }} <a href="{{ route('users.register') }}">{{ __('Create an account!') }}</a>
    </div>
</form>
