<div class="col-lg-6 col-md-12 mb-1 mb-sm-0 py-1">
    <label for="{{ $id ?? $name }}" class="form-label">{{ __($label) }}</label>
    <input class="form-control" type="file" id="{{ $id ?? $name }}" wire:model="{{ $model ?? $name }}" multiple>

    @error($name)
    <small style="color: red;">{{ $message }}</small>
@enderror
</div>
