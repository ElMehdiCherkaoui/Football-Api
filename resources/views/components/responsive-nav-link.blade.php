@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full px-4 py-2 rounded-xl text-start text-base font-semibold text-emerald-700 bg-emerald-50'
            : 'block w-full px-4 py-2 rounded-xl text-start text-base font-medium text-slate-700 hover:bg-slate-100 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
