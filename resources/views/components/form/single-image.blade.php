<div class="col-lg-6 col-md-12 mb-1 mb-sm-0 py-1">
    <label for="{{ $id ?? $name }}" class="form-label">{{ __($label) }}</label>
    <input class="form-control @error($model ?? $name) is-invalid @enderror" type="file" id="{{ $id ?? $name }}"
        wire:model="{{ $model ?? $name }}">
    @if ($description ?? false)
        <small>{{ __($description) }}</small>
    @endif
    @error($model ?? $name)
        <div class="invalid-feedback">{{ __($message) }}
        </div>
    @enderror
</div>
