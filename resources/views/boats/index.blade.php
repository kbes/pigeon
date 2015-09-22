<head>
    <title>Laravel</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Width</th>
                <th>Length</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($boats as $boat)
            <tr>
                <td>{{ $boat->id }}</td>
                <td>{{ $boat->name }}</td>
                <td>{{ $boat->width }}</td>
                <td>{{ $boat->length }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
