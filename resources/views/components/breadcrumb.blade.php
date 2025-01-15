@props(['list', 'url'])

<nav class="text-sm font-semibold mb-4">
    <ol class="list-reset flex">
        @foreach ($list as $index => $item)
            @if ($index < count($list) - 1)
                <li>
                    <a href="{{ url($url[$index]) }}" class="text-gray-500 hover:text-gray-700">{{ $item }}</a>
                </li>
                <li><span class="mx-2">/</span></li>
            @else
                <li class="text-blue-600">{{ $item }}</li>
            @endif
        @endforeach
    </ol>
</nav>