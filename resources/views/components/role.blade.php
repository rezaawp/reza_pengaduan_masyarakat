@props(['role'])

@php
    $roles = auth()
        ->user()
        ->getRoleNames()
        ->toArray();

    $pecahRole = explode('|', $role);
@endphp

@foreach ($pecahRole as $role)
    @if (in_array($role, $roles))
        {{ $slot }}
    @endif
@endforeach
