<!doctype html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <meta name="description" content="@TODO insert descrip">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ Session::token() }}">
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    </head>
    <body>
    <h1>Pigeon</h1>

    <navigation>
        <ul>
            <li>
                <a href="{{ url('trips/index') }}">
                    Trips
                </a>
            </li>
            <li>
                <a href="{{ url('boats/index') }}">
                    Boats
                </a>
            </li>
            <li>
                <a href="{{ url('cargo') }}">
                    Cargo
                </a>
            </li>
            <li>
                <a href="{{ url('settings/index') }}">
                    Settings
                </a>
            </li>
        </ul>
        <a href="{{ url('auth/logout') }}">Logout</a>
    </navigation>
    <div class="content">
        @yield('content')
    </div>
    </body>
</html>