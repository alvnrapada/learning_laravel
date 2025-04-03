@props(['active' => false])

<a {{ $attributes }} class="{{ $active ? 'text-blue-600' : 'text-gray-900'}} text-sm/6 font-semibold">{{ $slot }}</a>
