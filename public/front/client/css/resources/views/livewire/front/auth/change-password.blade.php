<form>
    <!-- 1 -->
    <div class="form-group">
        <label for="current-password"></label>
        <input id="current-password" type="password" class="form-control"
            style="@error('current_password')
            border-color: rgb(230, 22, 22);
            @enderror"
            name="current-password" wire:model="current_password" placeholder="Current Password" required autofocus>
        <span toggle="#password" class="toggle-password fa fa-fw fa-eye" data-target="#password1"></span>
    </div>
    @error('current_password')
        <div style="color: rgb(230, 22, 22);">{{ __($message) }}</div>
    @enderror

    <!-- 2 -->
    <div class="form-group">
        <label for="new_password"></label>
        <input id="new_password" wire:model="new_password" type="password" class="form-control" name="new_password"
            placeholder="New Password" required autofocus
            style="@error('new_password')
            border-color: rgb(230, 22, 22);
            @enderror">
        <span toggle="#password" class="toggle-password fa fa-fw fa-eye" data-target="#password2"></span>
    </div>
    @error('new_password')
        <div style="color: rgb(230, 22, 22);">{{ __($message) }}</div>
    @enderror
    <!-- 2 -->

    <div class="form-group">
        <label for="new_password_confirmation"></label>
        <input id="new_password_confirmation" wire:model="new_password_confirmation" type="password"
            class="form-control" name="new_password_confirmation" placeholder="Confirm New Password" required autofocus>
        <span toggle="#password" class="toggle-password fa fa-fw fa-eye" data-target="#password3"></span>
    </div>

    <div class="form-group no-margin">
        <button type="button" wire:click="updatePassword()" class="btn btn-primary btn-block">
            {{__('Change password')}}
        </button>
    </div>

    @if ($msgStatus == 'error')
        <div class="alert alert-danger form-group" role="alert">
            {{ __($msg) }}
        </div>
    @elseif ($msgStatus == 'success')
        <div class="alert alert-primary form-group" role="alert">
            {{ __($msg) }}
        </div>
    @endif
</form>
