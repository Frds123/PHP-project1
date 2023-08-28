@props(['label', 'labelFor', 'name', 'value'])

<div class="">
    <label for="{{$labelFor}}" class="form-label">{{$label}}</label>
    <textarea class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" {{ $attributes }}>
        {{ $value }}
    </textarea>

</div>
