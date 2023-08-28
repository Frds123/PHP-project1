@props(['label', 'labelFor', 'name', 'dropdown_list', 'options' => [], 'data' => null])

<select name="{{ $name }}" {{ $attributes->merge(['class' => 'form-control']) }}>
    <option value="">Select {{ $label }}</option>
    @foreach ($options as $item)
        <option value="{{ $item->id }}" {{ $data === $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
    @endforeach
</select>
