@props(['value'])

<label {{ $attributes->merge(['class' => 'form-lebel']) }}>
    {{ $value ?? $slot }}
</label>
