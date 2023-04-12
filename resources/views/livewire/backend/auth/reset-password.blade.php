<form>
    <div class="mb-1">
        <label for="forgot-password-email" class="form-label">Email</label>
        <input type="text" class="form-control @error('email')
        is-invalid
        @enderror"
            id="email" name="email" placeholder="john@example.com" wire:model="email"
            aria-describedby="forgot-password-email" tabindex="1" autofocus />
        @error('email')
            <div class="invalid-feedback">{{ __($message) }}
            </div>
        @enderror
    </div>


    <button type="button" class="btn btn-primary w-100" wire:click="resetPassword" tabindex="2">Send reset
        link</button>
</form>
