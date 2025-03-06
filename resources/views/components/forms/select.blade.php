<div class="form-group">

    <label for="{{ $id }}">{{ $label }}</label>

    <select {{ $attributes->merge(['class' => 'form-control']) }}
        class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $id }}">
        {{ $slot }}
    </select>

    @if ($hintText)
        <small class="form-text text-muted">{{ $hintText }}</small>
    @endif

    @error($name)
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror

</div>
