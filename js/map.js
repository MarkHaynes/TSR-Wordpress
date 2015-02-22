function initialize() {


  var point = new google.maps.LatLng(52.662313, -2.482342);

  var settings = {
    zoom: 12,
    center: point,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  var map = new google.maps.Map(document.getElementById("map"),settings);

  var pin = 'http://markhaynes.me/projects/telford/wp-content/themes/telford/images/marker.png';

  var contentString = '<div id="map-info">'+
      '<h1 id="map-heading" class="map-heading">Telford Steam Railway</h1>'+
      '<div id="map-content">'+
      '<p>Need Directions? Let us help you find them.</p>'+
      '</div>'+
      '</div>';


  var infowindow = new google.maps.InfoWindow({
        content: contentString
    });


  var marker = new google.maps.Marker({
    draggable: false,
    raiseOnDrag: false,
    icon: pin,
    map: map,
    position: point
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

}
