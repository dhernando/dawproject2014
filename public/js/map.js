$( ".mapa" ).click(function() {
  latitude = $( this ).attr('latitude');
  longitude = $( this ).attr('longitude');
  divname = 'mapa'+$( this ).attr('valor');
  mostrandogmap(latitude,longitude,divname);
});

function mostrandogmap(latitude, longitude, divname) {
    var options = {
        zoom: 14
        , center: new google.maps.LatLng(latitude, longitude)
        , mapTypeId: google.maps.MapTypeId.ROADMAP
    };
 
    var map = new google.maps.Map(document.getElementById(divname), options);
 
    var marker = new google.maps.Marker({
        position: map.getCenter()
        , map: map
        , icon: 'http://gmaps-samples.googlecode.com/svn/trunk/markers/blue/blank.png'
    });
}