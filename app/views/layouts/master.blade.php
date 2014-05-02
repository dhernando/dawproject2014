<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>@yield('title')</title>
        <!-- Librerias -->
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="{{ URL::asset('js/bootstrap.js') }}"></script>
        <!-- CSS -->
        <link rel='stylesheet' href="{{ URL::asset('css/admin.css')}}">
        <link rel='stylesheet' href='//bootswatch.com/lumen/bootstrap.min.css'>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    </head>
    <body>
        <div class='container-fluid'>
            <div class='row'>
                @yield('content')
            </div>
        </div>
    </body>
</html>