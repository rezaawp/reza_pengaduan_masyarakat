@props(['key'])

@if (session()->get($key))
    {{ $slot }}
@endif
