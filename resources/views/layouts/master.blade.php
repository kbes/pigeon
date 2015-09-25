<!doctype html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <meta name="description" content="@TODO insert descrip">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ Session::token() }}">
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <link rel="stylesheet" type="text/css" href="/css/bs-theme/toolkit-light.min.css">
    </head>
    <body data-controller="BaseCtrl" data-scope="BaseCtrl">
        <div class="container">
            <div class="row">
                <h1>Pigeon</h1>
                <div class="col-sm-12">
                    <nav>
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
                    </nav>
                    <a href="{{ url('auth/logout') }}" class="logout">Logout</a>
                </div>
                <div class="content">
                    @yield('content')
                </div>

                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                <script type="text/javascript" src="{{ url('js/bundle.js') }}?v={{ filemtime(public_path() . '/js/bundle.js')  }}"></script>
                <script src="{{ url('js/list.min.js') }}"></script>
                <script src="{{ url('js/list.pagination.js') }}"></script>
            </div>
        </div>
    </body>
</html>