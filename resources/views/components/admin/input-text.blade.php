<div class="mb-3">
    <label class="form-label">{{ $label }}</label>
    <input type="{{ $type == null ? 'text' : $type }}"
    {{ $attributes }}
    {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}
    placeholder="{{ $placeholder }}"
        value="{{ $value }}" name="{{ $name }}" />

    @if($hint)
    <span class="form-hint">{{ $hint }}</span>
    @endif
    <x-input-error :message="$errors->first($name)" />
</div>
