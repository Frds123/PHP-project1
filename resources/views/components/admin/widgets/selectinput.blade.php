@props([
    'options' => [],
    'selectedOptions' => []
])

<select {{ $attributes->merge(['class' => 'form-control']) }}>
    @foreach($options as $value => $label)
        <option value="{{ $value }}" isSelected($value)>{{ $label }}</option>
    @endforeach
</select>