<div class="mb-1">
    <label class="form-label" for="{{ $id ?? $name }}">{{ __($label) }}</label>
    <input id="{{ $id ?? $name }}" wire:model="{{ $model ?? $name }}" name="{{ $name }}"
        class="form-control @error($model ?? $name)
    is-invalid
    @enderror" type="{{ $type }}"
        placeholder="{{ __($placeholder) ?? __('Enter the ' . $name) }}">
    @error($model ?? $name)
        <div class="invalid-feedback">{{ __($message) }}
        </div>
    @enderror
</div>
