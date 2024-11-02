@props(['active' => false])

<a {{ $attributes }} class="block py-2 px-3 rounded {{ $active ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} text-sm font-medium" aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
