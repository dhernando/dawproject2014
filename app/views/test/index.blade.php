@foreach ($dades as $dada)
	<tr>
	    <td>{{ $dada->nombre }}</td>
	    <td>{{ $dada->descripcion }}</td>
	    <td>{{ HTML::image('uploads/'.AppHelper::clean($dada->nombre).'/'.$dada->imagen.'.jpg', $dada->nombre, array('class' => 'imageGroup')) }}</td>
	</tr>
@endforeach

<?php print_r($json);?>

@extends('layouts.home')
 
@section('title') Perfil Grupo @stop
 
@section('content')
 
<!--<hr>-->
<div class="container">
    <div class="row">
        <div class="col-sm-10"><h1>Arctic Monkeys</h1></div>
        <!--<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>-->
    </div>
    <div class="row">
        <div class="col-sm-3"><!--left col-->
              
          <ul class="list-group">
            <li class="list-group-item text-muted">Perfil</li>
            <li class="list-group-item imatge"><img src="http://www.rockaxis.com/imagenes/1386278247_Arctic%20Monkeys.jpg"></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Origen</strong></span> Reino Unido</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Genero</strong></span> Rock</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Actividad</strong></span> 2002 - presente</li>
            
          </ul> 
               
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="www.arcticmonkeys.com">arcticmonkeys.com</a></div>
          </div>
          
          
          <ul class="list-group">
            <li class="list-group-item text-muted">Actividad <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Visitas</strong></span> 125</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
          </ul> 
               
          <div class="panel panel-default">
            <div class="panel-heading">Redes sociales</div>
            <div class="panel-body">
                <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div>
          
        </div><!--/col-3-->
        <div class="col-sm-9">
          
          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#home" data-toggle="tab">España</a></li>
            <li><a href="#messages" data-toggle="tab">Alemania</a></li>
            <li><a href="#settings" data-toggle="tab">Francia</a></li>
          </ul>
              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Evento</th>
                      <th>Fecha</th>
                      <th>Ciudad</th>
                      <th>Descripción</th>
                      <th>Mapa</th>
                    </tr>
                  </thead>
                  <tbody id="items">
                    <tr>
                      <td>1</td>
                      <td>Nas @ UB Stadium in Buffalo, NY</td>
                      <td>Friday, April 29, 2011 at 7:00pm</td>
                      <td>Buffalo, NY</td>
                      <td>2011 Block Party: featuring Kid Cudi, Damian Marley, Nas &amp; Spec. Guest</td>
                      <td class="imatgemapa">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne1" onclick="$('#collapseOne1').toggle();">
                          <img src="http://icons.iconarchive.com/icons/marcus-roberto/google-play/512/Google-Maps-icon.png">
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="6" class="amagada">
                        <div id="collapseOne1" class="panel-collapse collapse">
                          <div class="map-frame"><iframe width="100%" height="300px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
                            <div class="map-content"></div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Nas @ UB Stadium in Buffalo, NY</td>
                      <td>Friday, April 29, 2011 at 7:00pm</td>
                      <td>Buffalo, NY</td>
                      <td>2011 Block Party: featuring Kid Cudi, Damian Marley, Nas &amp; Spec. Guest</td>
                      <td class="imatgemapa">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne2" onclick="$('#collapseOne2').toggle();">
                          <img src="http://icons.iconarchive.com/icons/marcus-roberto/google-play/512/Google-Maps-icon.png">
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="6" class="amagada">
                        <div id="collapseOne2" class="panel-collapse collapse">
                          <div class="map-frame"><iframe width="100%" height="300px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=27.0625,-95.677068&amp;spn=46.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
                            <div class="map-content"></div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div><!--/table-resp-->

              <h4>Recent Activity</h4>
              
              <div class="table-responsive">
                <table class="table table-hover">
                  
                  <tbody>
                    <tr>
                      <td><i class="pull-right fa fa-edit"></i> Today, 1:00 - Jeff Manzi liked your post.</td>
                    </tr>
                    <tr>
                      <td><i class="pull-right fa fa-edit"></i> Today, 12:23 - Mark Friendo liked and shared your post.</td>
                    </tr>
                    <tr>
                      <td><i class="pull-right fa fa-edit"></i> Today, 12:20 - You posted a new blog entry title "Why social media is".</td>
                    </tr>
                    <tr>
                      <td><i class="pull-right fa fa-edit"></i> Yesterday - Karen P. liked your post.</td>
                    </tr>
                    <tr>
                      <td><i class="pull-right fa fa-edit"></i> 2 Days Ago - Philip W. liked your post.</td>
                    </tr>
                    <tr>
                      <td><i class="pull-right fa fa-edit"></i> 2 Days Ago - Jeff Manzi liked your post.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
             </div><!--/tab-pane-->
             <div class="tab-pane" id="messages">
               
               <h2></h2>
               
               <ul class="list-group">
                  <li class="list-group-item text-muted">Inbox</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Here is your a link to the latest summary report from the..</a> 2.13.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Hi Joe, There has been a request on your account since that was..</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Nullam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Thllam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Wesm sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">For therepien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Also we, havesapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Swedish chef is assaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  
                </ul> 
               
             </div><!--/tab-pane-->
             <div class="tab-pane" id="settings">
                    
                
                  <!--<hr>-->
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Mobile</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Location</h4></label>
                              <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Verify</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
                </form>
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->

 
@stop