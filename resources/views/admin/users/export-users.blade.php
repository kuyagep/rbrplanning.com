<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/') }}assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/') }}assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/') }}assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{ asset('/') }}assets/favicon//site.webmanifest">
    <title>{{ $title ?? 'Export Details' }}</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>

<body>

    <table style="position: relative;">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email Name</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->school->name ?? 'N/A' }}</td>
                    <td>{{ date('F j, Y', strtotime($user->created_at)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
