<div class="col-sm-6 col-12  py-1">
    <button class="btn btn-primary waves-effect waves-float waves-light" type="{{ $type }}"
        wire:click="{{ $action }}">{{ __($text) }}</button>
    <button class="btn btn-secondary waves-effect waves-float waves-light" type="reset">{{ __('Cancel') }}</button>
</div>
