@extends ('layouts.home')
@section ('title')
	Home
@stop

<!-- BODY -->
@section ('content')
	<section id="header">
        <div class="container">
            <header>
                <!-- HEADLINE -->
                <h1 data-animated="GoIn"><b>Crescendo</b> your favourite search engine...</h1>
            </header>
            
            <!-- START TIMER -->
            <!--<div id="timer" data-animated="FadeIn">
                <p id="message"></p>
                <div id="days" class="timer_box"></div>
                <div id="hours" class="timer_box"></div>
                <div id="minutes" class="timer_box"></div>
                <div id="seconds" class="timer_box"></div>
            </div>-->
            <!-- END TIMER -->
            <div class="col-lg-4 col-lg-offset-4 mt centered">
				<form class="form-inline" role="form" action="{{ URL::to('/perfil')}}" method="post">
				  <!--<div class="form-group">
				    <label class="sr-only" for="exampleInputEmail2">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
				  </div>
				  <button type="submit" class="btn btn-info">Submit</button>-->
          <div class="input-group">
              <input name="busqueda" type="text" class="form-control" placeholder="Bands">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-default inputmida" type="button"><span class="glyphicon glyphicon-search colorbutton"></span></button>
              </span>
          </div><!-- /input-group -->
				</form>            
        <div class="redesociales">
                <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
              </div>
			</div>
            
        </div>
        <!-- LAYER OVER THE SLIDER TO MAKE THE WHITE TEXTE READABLE -->
        <div id="layer"></div>
        <!-- END LAYER -->
        <!-- START SLIDER -->
        <div id="slider" class="rev_slider">
            <ul>
              <li data-transition="slideleft" data-slotamount="1" data-thumb="img/slider/1.jpg">
                <img src="img/slider/1.jpg">
              </li>
              <li data-transition="slideleft" data-slotamount="1" data-thumb="img/slider/2.jpg">
                <img src="img/slider/2.jpg">
              </li>
              <li data-transition="slideleft" data-slotamount="1" data-thumb="img/slider/3.jpg">
                <img src="img/slider/3.jpg">
              </li>
              <li data-transition="slideleft" data-slotamount="1" data-thumb="img/slider/4.jpg">
                <img src="img/slider/4.jpg">
              </li>
            </ul>
        </div>
        <!-- END SLIDER -->
    </section>

@stop