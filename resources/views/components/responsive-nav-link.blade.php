@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full pl-3 pr-4 py-2 border-l-4 border-indigo-400 white:border-indigo-600 text-left text-base font-medium text-indigo-700 white:text-indigo-300 bg-indigo-50 white:bg-indigo-900/50 focus:outline-none focus:text-indigo-800 white:focus:text-indigo-200 focus:bg-indigo-100 white:focus:bg-indigo-900 focus:border-indigo-700 white:focus:border-indigo-300 transition duration-150 ease-in-out'
            : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-600 white:text-gray-400 hover:text-gray-800 white:hover:text-gray-200 hover:bg-gray-50 white:hover:bg-gray-700 hover:border-gray-300 white:hover:border-gray-600 focus:outline-none focus:text-gray-800 white:focus:text-gray-200 focus:bg-gray-50 white:focus:bg-gray-700 focus:border-gray-300 white:focus:border-gray-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
