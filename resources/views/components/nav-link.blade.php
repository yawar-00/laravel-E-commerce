@props(['active'])

@php
    $classes = ($active ?? false)
        ? 'inline-flex items-center px-4 py-2 border-b-2 border-indigo-600 text-sm font-semibold text-indigo-700 dark:text-indigo-300 transition-all duration-200 ease-in-out'
        : 'inline-flex items-center px-4 py-2 border-b-2 border-transparent text-sm font-medium text-gray-600 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-300 hover:border-indigo-400 dark:hover:border-indigo-500 transition-all duration-200 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
