function initialize() {

  var myLatLng = new google.maps.LatLng(-34.1840517,150.7131903);
  var mapOptions = {
    zoom: 17,
    center: myLatLng,
    disableDefaultUI: true,
    mapTypeControl: true,
    mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
        position: google.maps.ControlPosition.BOTTOM_LEFT
    }
  };
  map = new google.maps.Map(document.getElementById('map'), mapOptions);
    var marker = new google.maps.Marker({
      draggable: true,
      position: myLatLng,
      map: map,
      title: "Your location"
    });
  google.maps.event.trigger(map, 'resize');
  google.maps.event.addListener(marker, 'dragend', function(event) {
    document.getElementById("observation_longitude").value = event.latLng.lat();
    document.getElementById("observation_lattitude").value = event.latLng.lng();
    geocoding();
  });

  google.maps.event.addListener(map, 'click', function(event) {
    document.getElementById("observation_longitude").value = event.latLng.lat();
    document.getElementById("observation_lattitude").value = event.latLng.lng();
    marker.setPosition(event.latLng);
    geocoding();
  });
} 

  function ioo() {
    $("#map").animate({"height" : "500px"}, 500,function(){
    //google.maps.event.trigger(map, "bounds_changed");
        initialize();
    });
};