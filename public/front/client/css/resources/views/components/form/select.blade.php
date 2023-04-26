  <div class="col-lg-6 col-md-12 mb-1 mb-sm-0 py-1">
      <label class="form-label" for="{{ $id ?? $name }}">{{ __($label) }}</label>
      <select class="form-select @error($model ?? $name)
      is-invalid
      @enderror" wire:model="{{ $model ?? $name }}"
          name="{{ $name }}" id="{{ $id ?? $name }}">
          <option>{{ __('-- Choose an option --') }}</option>
          @foreach ($options as $option)
              <option value="{{ is_string($option) ? $option : $option->id }}">
                  {{ is_string($option) ? __(ucfirst($option)) : $option->name ?? $option->code ?? $option->title ?? $option->id}}</option>
          @endforeach
      </select>
      @error($model ?? $name)
          <div class="invalid-feedback">{{ __($message) }}
          </div>
      @enderror
  </div>
