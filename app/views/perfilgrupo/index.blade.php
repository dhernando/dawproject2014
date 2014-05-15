@extends('layouts.home')
 
@section('title') Perfil Grupo @stop
 
@section('content')

<!--<hr>-->
<div class="container perfilgrupo">
    <div class="row">
      <!-- Nombre grupo -->
      <div class="col-sm-10"><h1>{{ $grupo }}</h1></div>
    </div>
    <div class="row">
      <?php //print_r($dades[0]->id); ?>
        <div class="col-sm-3"><!--left col-->
          <!-- Control perfil + print perfil -->
          <ul class="list-group followbtn">
            <li class="list-group-item text-muted">Profile 
              
              @if(Auth::check())
              <?php 
                $following = false;
                if ($favs != ""){
                  for($i=0;$i<count($favs);$i++) { 
                    if ($favs[$i]->nombre == $dades[0]->nombre) {
                      $following = true;
                    }
                  }
                }
              ?>
              <?php if ($following == true) {?>
                <button class="btn followButton following" value="{{ $dades[0]->id }}" rel="6">Following</button>
              <?php }else { ?>
                <button class="btn followButton follow" value="{{ $dades[0]->id }}" rel="6">Follow</button>
              <?php } ?>
              @endif
            </li>
            <?php if ( isset ($dades[0]->imagen) and isset($dades[0]->nombre) ) { ?>
            <li class="list-group-item imatge">{{ HTML::image('uploads/'.AppHelper::clean($dades[0]->nombre).'/'.$dades[0]->imagen.'.jpg', $dades[0]->nombre) }}</li>
            <?php } else {?>
            <li class="list-group-item imatge">{{ HTML::image('img/nofoto.jpg') }}</li>
            <?php } ?>
            <?php if ( isset($dades[0]->origen) and $dades[0]->origen ) { ?>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Origin</strong></span> {{ $dades[0]->origen }}</li>
            <?php } else {?>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Origin</strong></span> No info</li>
            <?php } ?>
            <?php if ( isset($dades[0]->genero) and $dades[0]->genero ) { ?>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Genre</strong></span> {{ $dades[0]->genero }}</li>
            <?php } else {?>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Genre</strong></span> No info</li>
            <?php } ?>
            <?php if ( isset($dades[0]->actividad) and $dades[0]->actividad ) { ?>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Activity</strong></span> {{ $dades[0]->actividad }}</li>
            <?php } else {?>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Activity</strong></span> No info</li>
            <?php } ?>
          </ul> 
          <!-- Control web + print web -->
          <?php if ( isset($dades[0]->web) ) { ?>
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://www.{{ $dades[0]->web }}">{{ $dades[0]->web }}</a></div>
          </div>
          <?php } ?>
          <?php if ( isset($dades[0]->busquedas) ) { ?>
          <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Visits</strong></span> {{ $dades[0]->busquedas }}</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Favs</strong></span> 13*</li>
          </ul> 
          <?php } ?>
          <!-- Control + print redes sociales -->
          <?php if ( isset($dades[0]->facebook) or isset($dades[0]->twitter) or isset($dades[0]->googleplus) ) {?>     
          <div class="panel panel-default">
            <div class="panel-heading">Social networks</div>
            <div class="panel-body">
                <?php if ( isset($dades[0]->facebook) ) { ?>
                  <a href="http://www.{{ $dades[0]->facebook }}"><i class="fa fa-facebook fa-2x"></i></a>
                <?php }?>
                <?php if ( isset($dades[0]->twitter) ) { ?>
                  <a href="http://www.{{ $dades[0]->twitter }}"><i class="fa fa-twitter fa-2x"></i></a>
                <?php }?>
                <?php if ( isset($dades[0]->googleplus) ) { ?>
                  <a href="http://www.{{ $dades[0]->googleplus }}"><i class="fa fa-google-plus fa-2x"></i></a>
                <?php }?>
            </div>
          </div>
          <?php } ?>
        </div><!--/col-3-->
        <div class="col-sm-9">
          <!-- Control + print descripción grupo musical -->
          <?php if ( isset($dades[0]->nombre) and isset($dades[0]->descripcion) ) { ?>
          <h4>Who are {{ $dades[0]->nombre }}?</h4>
          <div class="descripciongrupo">
            {{ $dades[0]->descripcion }}
          </div>
          <?php } ?>
          <h4>{{ $grupo }} events</h4>
          <div class="tab-content">
            <div class="tab-pane active" id="home">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Place</th>
                      <th>City</th>
                      <th>Country</th>
                      <th>Date event</th>
                      <th>Tickets</th>
                      <th>Map</th>
                    </tr>
                  </thead>
                  <tbody id="items">
                    <?php $i = 0; 
                    if ($json != null) {
                    ?>
                    @foreach ($json as $dada)
                      <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $dada->venue->name }}</td>
                        <td>{{ $dada->venue->city }}</td>
                        <td>{{ $dada->venue->country }}</td>
                        <td>{{ $dada->formatted_datetime }}</td>
                        <td class="ticket">
                          <?php if ($dada->ticket_url == null ){ ?>
                            <img src="{{ URL::asset('img/no-ticket.png') }}">
                          <?php }else{ ?>
                            <a href="{{ $dada->ticket_url }}"><img src="{{ URL::asset('img/ticket.png') }}"></a> 
                            <?php } ?>
                        </td>
                        <td class="imatgemapa">
                          <a data-toggle="collapse" data-parent="#accordion" href="#{{ $i }}" onclick="$('#{{ $i }}').toggle();">

                            <img src="{{ URL::asset('img/map.png') }}">
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="7" class="amagada">
                          <div id="{{ $i }}" class="panel-collapse collapse">
                            <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps/ms?q='+{{ $dada->venue->latitude }}+','+{{ $dada->venue->longitude }}+'&amp;ie=UTF8&amp;hl=en&amp;msa=0&amp;msid=116640587348333367942.000470de64cbe4ae5b3f6&amp;ll={{ $dada->venue->latitude }},{{ $dada->venue->longitude }}&amp;z=15&amp;output=embed"></iframe>
                              <!--<div class="map-content"></div>-->
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php $i++; ?>
                    @endforeach
                    <?php } else {?>
                      <tr>
                        <td colspan="7" class="noevents">
                          <p>No events for this group</p>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div><!--/table-resp-->              
             </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->

 
@stop