<div class="card-wrapper">
    <!-- Add Image -->
    <div>
        <label for="imageUpload" class="custom-file-upload" style="background-image: ;">

        </label>
        <input type="file" id="imageUpload" wire:model="image">
        <div id="imagePreview"></div>
    </div>
    <!--Start Card -->
    <div class="card-body">
        <form method="POST">
            <div class="form-group">
                <div class="first-last">
                    <label for="fullname"> {{ __('Full Name') }} </label>
                    <input type="text" class="first form-control" wire:model="fullname" name="name" required
                        autofocus>
                    @error('fullname')
                        <small style="color: red;">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="email"> {{ __('E-Mail Address') }} </label>
                <input id="email" type="email" wire:model="email" class="form-control" name="email" required>
                @error('email')
                    <small style="color: red;">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone"> {{ __('Phone Number') }} </label>
                <input id="phone" type="tel" class="form-control" wire:model="phone" name="phone" required
                    value="966 |">
                @error('phone')
                    <small style="color: red;">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <!-- Switch -->
            <div class="form-check form-switch">
                <label class="form-check-label" for="flexSwitchCheckDefault"> {{ __('Notification') }} </label>
                <input class="form-check-input" type="checkbox" wire:model="notification" role="switch"
                    id="flexSwitchCheckDefault">
                @error('notification')
                    <small style="color: red;">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="form-group no-margin">
                <button type="button" wire:click="updateAccount()" class="btn btn-primary btn-block">
                    {{ __('Save Edit') }}
                </button>
            </div>
        </form>
    </div>
</div>
