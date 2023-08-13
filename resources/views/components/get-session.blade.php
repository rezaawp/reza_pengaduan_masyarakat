@props(['key'])

@if (session()->has($key))
    {{ session()->get($key) }}
@endif
