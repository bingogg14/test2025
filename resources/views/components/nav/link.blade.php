@props([
  'href',
  'active' => false,
])

@php
    $base            = 'px-3 py-2 rounded-md text-sm font-medium';
    $activeClasses   = 'bg-gray-900 text-white';
    $inactiveClasses = 'text-gray-300 hover:bg-gray-700 hover:text-white';
@endphp

<a href="{{ $href }}"
   class="{{ $base }} {{ $active ? $activeClasses : $inactiveClasses }}">
    {{ $slot }}
</a>
