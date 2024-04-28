@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-base text-[#a5b1bc]']) }}>
    {{ $value ?? $slot }}
</label>
