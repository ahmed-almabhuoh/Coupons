<div class="col-12">
    <div class="mb-1">
        <label class="form-label" for="{{ $id ?? $name }}}">{{ $label }}</label>
        <textarea class="form-control @error('description')
        is-invalid
        @enderror" name="{{ $name }}"
            wire:model="{{ $model ?? $name }}" id="{{ $id ?? $name }}" rows="{{ $row }}" cols="{{ $col }}"
            placeholder="{{ $placeholder }}">{{ $value ?? '' }}</textarea>

        @error('description')
            <div class="invalid-feedback">{{ __($message) }}
            </div>
        @enderror
    </div>
</div>
