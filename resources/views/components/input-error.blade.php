@props(['messages'])

@if ($messages)
    <ul style="list-style-type: none !important;" {{ $attributes->merge(['class' => 'text-sm p-0']) }}>
        @foreach ((array) $messages as $message)
            <li style="color: red" class="m-0"> <small>{{ $message }}</small></li>
        @endforeach
    </ul>
@endif
