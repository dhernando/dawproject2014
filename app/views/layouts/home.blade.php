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
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false" type="text/javascript"></script>
<script>
var map;
function initialize() {
   var mapOptions = {
           zoom: 9,
           center: new google.maps.LatLng(28.9285745, 77.09149350000007),   
           mapTypeId: google.maps.MapTypeId.TERRAIN
       };
 
   map = new google.maps.Map(document.getElementById('location-canvas'),
                                   mapOptions);
                              
   var marker = new google.maps.Marker({
                   map: map, 
                   draggable: false, 
                   position: new google.maps.LatLng(28.9285745, 77.09149350000007)
       });
}
                        
google.maps.event.addDomListener(window, 'resize', initialize);
google.maps.event.addDomListener(window, 'load', initialize);
//google.maps.event.trigger(map, 'resize')
</script>


    </head>
    <body class="nomobile">

        <!-- Side Menu -->
        <a id="menu-toggle" href="#" class="btn btn-primary btn-lg toggle"><i class="fa fa-bars"></i></a>
        <div id="sidebar-wrapper">
            <div class='col-md-12 col-md-offset-0'>
                <a id="menu-close" href="#" class="btn btn-default btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
                @if(Auth::check())
                    <img src="http://images.football365.com/14/01/800x600/Hull-v-Chelsea-Jose-Mourinho_3064486.jpg" alt="user" class="img-rounded img-responsive">
                    <h4>{{Auth::user()->getFullName()}}</h4>
                    <div class="menu-options">
                        <a href="/dawproject2014/public/logout" class="btn btn-group btn-group-justified">Edit profile</a>
                        <a href="/dawproject2014/public/logout" class="btn btn-group btn-group-justified">Favourite Groups</a>
                        <a href="/dawproject2014/public/logout" class="btn btn-group btn-group-justified">Logout</a>
                    </div>
                @else
                    @if ($errors->has())
                        @foreach ($errors->all() as $error)
                            <div class='bg-danger alert'>{{ $error }}</div>
                        @endforeach
                    @endif
                    <h3 class="sidebar_text"><i class='fa fa-lock sidebar_text'></i> Login</h3>
                    {{ Form::open(['url' => ' ', 'method' => 'post']) }}

                    <div class='form-group sidebar_text'>
                        {{ Form::label('username', 'Username') }}
                        {{ Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) }}
                    </div>

                    <div class='form-group sidebar_text'>
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
                    </div>

                    <div class='form-group sidebar_text'>
                        {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
                    </div>

                    {{ Form::close() }}

                    <div class="sidebar_text">Not a member yet? {{ HTML::link('/register', 'Register') }}</div>
                    @endif
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