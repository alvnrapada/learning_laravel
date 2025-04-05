@props(['dropdownItems'])

<div class="mt-2 grid grid-cols-1">
    <select 
        {{ $attributes->merge([
            'class' => 'border border-gray-300 col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6'
        ]) }}>
        @foreach ($dropdownItems as $item)
            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
        @endforeach
    </select>
    <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4"
        viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
        <path fill-rule="evenodd"
            d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
            clip-rule="evenodd" />
    </svg>
</div>