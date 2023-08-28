@props(['disabled' => false])

{{-- <div class="input-group input-group-dynamic"> --}}
    
    {{-- <x-admin.widgets.lebel name= {{$name ? 'name' : ''}} /> --}}

    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'multisteps-form__input
    form-control']) !!}>

    @error($disabled)
        <span class="small text-danger">{{ $message }}</span>
    @enderror

{{-- </div> --}}
