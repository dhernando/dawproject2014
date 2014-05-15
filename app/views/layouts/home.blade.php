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
        <link href="{{ URL::asset('css/bootstrap-switch.css') }}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="assets/js/html5shiv.js"></script>
          <script src="assets/js/respond.min.js"></script>
        <![endif]-->
        
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false" type="text/javascript"></script>
    </head>
    <body class="nomobile">

        <!-- Side Menu -->
        <a id="menu-toggle" href="#" class="btn btn-primary btn-lg toggle"><i class="fa fa-bars"></i></a>
        <div id="sidebar-wrapper">
            <div class='col-md-12 col-md-offset-0'>
                <a id="menu-close" href="#" class="btn btn-default btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
                @if(Auth::check())
                <?php if (isset(Auth::user()->getUser()->imagen)) { ?>
                    {{ HTML::image('uploads/users/'.AppHelper::clean(Auth::user()->getUser()->username).'/'.Auth::user()->getUser()->imagen.'.jpg', Auth::user()->getUser()->username, array('class' =>'img-rounded img-responsive')) }}
                <?php } else {?>
                    {{ HTML::image('img/nofoto.jpg', 'No picture available', array('class' =>'img-rounded img-responsive')) }}
                <?php } ?>
                    <h4>{{Auth::user()->getFullName()}}</h4>
                    <div class="menu-options">

                        <a data-toggle="collapse" class="btn btn-group btn-group-justified" data-parent="#accordion" href="#editprofile" onclick="$('#editprofile').toggle();">Edit profile</a>
                        <div id="editprofile" class="panel-collapse collapse">
                            @if ($errors->has())
                                @foreach ($errors->all() as $error)
                                    <div class='bg-danger alert'>{{ $error }}</div>
                                @endforeach
                            @endif
                            {{ Form::open(['role' => 'form', 'route' => 'home.update', 'files' => 'true']) }}

                            {{ Form::hidden('id', Auth::user()->getUser()->id) }}
 
                            <div class='form-group sidebar_form sidebar_form_first'>
                                {{ Form::text('nombre', Auth::user()->getUser()->nombre, ['placeholder' => 'Nombre', 'class' => 'form-control']) }}
                            </div>
                         
                            <div class='form-group sidebar_form'>
                                {{ Form::text('apellido', Auth::user()->getUser()->apellido, ['placeholder' => 'Apellido', 'class' => 'form-control']) }}
                            </div>
                         
                            <div class='form-group sidebar_form'>
                                {{ Form::email('email', Auth::user()->getUser()->email, ['placeholder' => 'Email', 'class' => 'form-control']) }}
                            </div>
                         
                            <div class='form-group sidebar_form'>
                                {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
                            </div>
                         
                            <div class='form-group sidebar_form'>
                                {{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) }}
                            </div>

                            <div class='form-group sidebar_text sidebar_form_last'>
                                {{ Form::file('image')}}
                            </div>

                            <div class='form-group sidebar_text'>
                                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                            </div>

                            {{ Form::close() }}   
                        </div>

                        <a data-toggle="collapse" class="btn btn-group btn-group-justified" data-parent="#accordion" href="#favouritegroups" onclick="$('#favouritegroups').toggle();">Favourite Groups</a>
                        <div id="favouritegroups" class="panel-collapse collapse">
                            <ul class="favorits">
                                <?php if(count($favs)==0) echo "You don't have favourite groups yet.";?>
                                @foreach($favs as $fav)
                                    <?php
                                        $artista_url = str_replace(" ", "%20", $fav->nombre);
                                        $artista_url = str_replace("/", "%252F", $artista_url);
                                    ?>
                                    <li>{{HTML::link('perfil/'.$artista_url, $fav->nombre)}}</li>
                                @endforeach

                            </ul>
                        </div>

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
        <script src="{{ URL::asset('js/bootstrap-switch.js') }}"></script>
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

        $('button.followButton').click(function (e) {
            e.preventDefault();
            $button = $(this);
            if($button.hasClass('following')){
                //$.ajax(); Do Unfollow
                $.ajax({
                    type: 'POST',
                    url : '/dawproject2014/public/unfollow',
                    data: {idgrupo: $(".following").val()},
                    success: function(result) {
                        $button.removeClass('following');
                        $button.removeClass('unfollow');
                        $button.text('Follow');     
                    }
                });
            } else {
                // $.ajax(); Do Follow
                $.ajax({
                    type: 'POST',
                    url : '/dawproject2014/public/follow',
                    data: {idgrupo: $(".follow").val()},
                    success: function(result) {
                        $button.addClass('following');
                        $button.text('Following');    
                    }
                });
            }
        });

        $('button.followButton').hover(function(){
             $button = $(this);
            if($button.hasClass('following')){
                $button.addClass('unfollow');
                $button.text('Unfollow');
            }
        }, function(){
            if($button.hasClass('following')){
                $button.removeClass('unfollow');
                $button.text('Following');
            }
        });
        </script>
    </body>
</html>