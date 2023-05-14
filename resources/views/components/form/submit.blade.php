<div class="col-sm-6 col-12  py-1">
    <button class="btn btn-primary waves-effect waves-float waves-light" type="{{ $type }}"
        wire:click="{{ $action }}">{{ __($text) }}</button>
    <a class="btn btn-secondary waves-effect waves-float waves-light"
        href="{{ url()->previous() }}">{{ __('Cancel') }}</a>
</div>
