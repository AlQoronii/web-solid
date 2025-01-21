<table class="min-w-full bg-white">
    <thead>
        <tr>
            @foreach($columns as $column)
                <th class="py-2 px-4 border-b text-center">{{ $column['label'] }}</th>
            @endforeach
            @if($actions)
                <th class="py-2 px-4 border-b text-center">Actions</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            @foreach($columns as $column)
                <td class="py-2 px-4 border-b text-center">
                    {{ $item[$column['field']] ?? 'N/A' }}
                </td>
            @endforeach
            @if($actions)
                <td class="py-2 px-4 border-b text-center">
                    @foreach($actions as $action)
                        {!! $action($item) !!}
                    @endforeach
                </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
