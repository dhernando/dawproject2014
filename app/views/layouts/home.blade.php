<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="assets/ico/favicon.png">

        <title>@yield('title')</title>

        <!-- CSS -->
        <link rel='stylesheet' href="{{ URL::asset('css/admin.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/body.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/footer.css') }}">
        <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/soon.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/stylish-portfolio.css') }}" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="assets/js/html5shiv.js"></script>
          <script src="assets/js/respond.min.js"></script>
        <![endif]-->
        
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    </head>
    <body class="nomobile">

        <!-- Side Menu -->
        <a id="menu-toggle" href="#" class="btn btn-primary btn-lg toggle"><i class="fa fa-bars"></i></a>
        <div id="sidebar-wrapper">
            <!--<ul class="sidebar-nav">
                <a id="menu-close" href="#" class="btn btn-default btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
                <li class="sidebar-brand"><a href="http://startbootstrap.com">Start Bootstrap</a>
                </li>
                <li><a href="#top">Home</a>
                </li>
                <li><a href="#about">About</a>
                </li>
                <li><a href="#services">Services</a>
                </li>
                <li><a href="#portfolio">Portfolio</a>
                </li>
                <li><a href="#contact">Contact</a>
                </li>
            </ul>-->
            <div class='col-md-12 col-md-offset-0'>
                    @if ($errors->has())
                        @foreach ($errors->all() as $error)
                            <div class='bg-danger alert'>{{ $error }}</div>
                        @endforeach
                    @endif
                    <a id="menu-close" href="#" class="btn btn-default btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
                    <h3><i class='fa fa-lock'></i> Login</h3>
                    {{ Form::open(['role' => 'form']) }}
                 
                    <div class='form-group'>
                        {{ Form::label('username', 'Username') }}
                        {{ Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) }}
                    </div>
                 
                    <div class='form-group'>
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
                    </div>
                 
                    <div class='form-group'>
                        {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
                    </div>
                 
                    {{ Form::close() }}
            </div>
        </div>
        <!-- /Side Menu -->

        @yield('content')
        <!-- Librerias -->
        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script type="{{ URL::asset('js/modernizr.custom.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('js/soon/plugins.js') }}"></script>
        <script src="{{ URL::asset('js/soon/jquery.themepunch.revolution.min.js') }}"></script>
        <script src="{{ URL::asset('js/soon/custom.js') }}"></script>
        <!-- Custom JavaScript for the Side Menu and Smooth Scrolling -->
        <script>
        $("#menu-close").click(function(e) {
            e.preventDefault();
            $("#sidebar-wrapper").toggleClass("active");
        });
        </script>
        <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#sidebar-wrapper").toggleClass("active");
        });
        </script>
    
    </body>
</html>