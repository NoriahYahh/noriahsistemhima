@props(['active'])

@php
$classes = ($active ?? false)
            ? 'active ease-in-out'
            : 'ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
