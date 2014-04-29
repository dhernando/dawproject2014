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
        <link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'>
        <link rel="stylesheet" href="{{ URL::asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/body.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/footer.css') }}">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">
                <span class="glyphicon glyphicon-music imageweb"></span>
                <span class="nameweb">Machacasaurio</span>
              </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><img class="avatar" src="img/avatar.jpg"><a class="username" href="#">Arturito Mas</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        <div class='container-fluid'>
            <div class='row'>
                @yield('content')
            </div>
        </div>
        <nav class="navbar-fixed-bottom footerdiv" role="navigation">
          <div class="container">
            Footer text, etc
          </div>
        </nav>
    </body>
</html>