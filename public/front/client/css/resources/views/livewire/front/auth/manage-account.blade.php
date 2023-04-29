<div class="card-wrapper">
    <!-- Add Image -->
    <div>
        <label for="imageUpload" class="custom-file-upload">
        </label>
        <input type="file" wire:model="image" id="imageUpload">
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
                </div>
            </div>
            <div class="form-group">
                <label for="email"> {{ __('E-Mail Address') }} </label>
                <input id="email" type="email" wire:model="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="Phone"> {{ __('Phone Number') }} </label>
                <input id="Phone" type="tel" class="form-control" wire:model="phone" name="Phone" required
                    value="966 |">
            </div>
            <!-- Switch -->
            <div class="form-check form-switch">
                <label class="form-check-label" for="flexSwitchCheckDefault"> {{ __('Notification') }} </label>
                <input class="form-check-input" type="checkbox" wire:model="notification" role="switch"
                    id="flexSwitchCheckDefault">
            </div>
            <div class="form-group no-margin">
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Save Edit') }}
                </button>
            </div>
        </form>
    </div>
</div>
