<div>
    <table id="mytable">
        <thead>
            <tr>
                <th>Response</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->label }}</td>
                <td>{{ $item->count }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
