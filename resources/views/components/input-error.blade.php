@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'p-1 border border-red-500 bg-red-100 text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
