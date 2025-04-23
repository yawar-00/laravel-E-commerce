<a {{ $attributes->merge([
    'class' => 'block w-full px-4 py-2 text-start text-sm font-medium text-gray-700 dark:text-gray-300 
                transition-all duration-200 ease-in-out'
])

 }}>
    {{ $slot }}
</a>
