<!-- filepath: /d:/Project/web-solid/resources/views/components/datatables.blade.php -->
<div>
    <table id="{{ $id }}" class="display">
        <thead>
            <tr>
                @foreach ($columns as $column)
                    <th class="{{ $column['style'] }}">{{ $column['label'] }}</th>
                @endforeach
                @if ($aksi)
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            <!-- Data will be populated by Datatables -->
        </tbody>
    </table>
</div>