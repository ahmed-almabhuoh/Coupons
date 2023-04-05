<div class="col-sm-6 col-12  py-1">
    <label class="form-label" for="{{ $id ?? $name }}">{{ __($label) }}</label>
    <input type="{{ $type }}" wire:model="{{ $model ?? $name }}"
        class="form-control @error($model ?? $name)
    is-invalid
    @enderror" name="{{ $name }}" id="{{ $id ?? $name }}"
        placeholder="{{ __($placeholder) ?? __('Enter the ' . $name) }}" {{-- @if ($isRequired) required="" @endif --}} {{-- @if ($readOnly) readonly @endif --}} />
    @error($model ?? $name)
        <div class="invalid-feedback">{{ __($message) }}
        </div>
    @enderror
</div>
