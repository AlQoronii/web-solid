@props(['id' => 'datatable', 'columns' => [], 'data' => [], 'options' => '{}'])

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush

<table id="{{ $id }}" class="min-w-full bg-white border">
    <thead>
        <tr>
            @foreach($columns as $column)
                <th class="py-2 px-4 border-b text-center">{{ $column }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
            <tr>
                @foreach($row as $cell)
                    <td class="py-2 px-4 border-b text-center">{!! $cell !!}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            @foreach($columns as $column)
                <th class="py-2 px-4 border-b text-center">{{ $column }}</th>
            @endforeach
        </tr>
    </tfoot>
</table>

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#{{ $id }}').DataTable({!! $options !!});
        });
    </script>
@endpush