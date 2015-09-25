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
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>