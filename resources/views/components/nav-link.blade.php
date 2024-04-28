@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-sky-500 text-sky-500 text-base font-medium leading-5 focus:outline-none  transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-base font-medium leading-5 text-gray-500 hover:text-sky-300 hover:border-sky-300 focus:outline-none  transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
