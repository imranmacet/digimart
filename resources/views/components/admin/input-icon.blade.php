<div class="mb-3">
    <label class="form-label">{{ $label }}</label>
    <div class="icon-picker" data-name="{{ $name }}" data-icon="{{ $value }}"></div>
    @if($hint)
    <span class="form-hint">{{ $hint }}</span>
    @endif
    <x-input-error :message="$errors->first($name)" />
</div>
