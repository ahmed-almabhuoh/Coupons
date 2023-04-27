<div class="col-12">
    <div class="mb-1">
        <label class="form-label" for="{{ $id ?? $name }}}">{{ __($label) }}</label>
        <textarea class="form-control @error($model ?? $name)
        is-invalid
        @enderror" name="{{ $name }}"
            wire:model="{{ $model ?? $name }}" id="{{ $id ?? $name }}" rows="{{ $row ?? 3 }}" cols="{{ $col ?? 5 }}"
            placeholder="{{ __($placeholder) }}"></textarea>

        @error($model ?? $name)
            <div class="invalid-feedback">{{ __($message) }}
            </div>
        @enderror
    </div>
</div>
