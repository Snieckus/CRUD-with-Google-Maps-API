<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAlNCDoXS14X9HJy2tIj-kF2yLHCGAG4IU&language=en">
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script type="text/javascript"> 
var map;
var marker;
var myLatlng = new google.maps.LatLng(54.898521,23.903597);
var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();
<?php if(isset($_SESSION['viewID']))
{
    ?>
    myLatlng = new google.maps.LatLng(<?php echo $_SESSION['latitudeView'];?>,<?php echo $_SESSION['longitudeView'];?>);
    function initialize(){
    var mapOptions = {
    zoom: 4,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

    marker = new google.maps.Marker({
    map: map,
    position: myLatlng,
    draggable: false 
    }); 

    geocoder.geocode({'latLng': myLatlng }, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
    if (results[0]) {
    $('#latitude,#longitude').show();
    $('#address').val(results[0].formatted_address);
    $('#latitude').val(marker.getPosition().lat());
    $('#longitude').val(marker.getPosition().lng());
    infowindow.setContent(results[0].formatted_address);
    infowindow.open(map, marker);
    }
    }
    });

}
    <?php
}
else
{
    ?>
    function initialize(){
var mapOptions = {
zoom: 4,
center: myLatlng,
mapTypeId: google.maps.MapTypeId.ROADMAP
};

map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

marker = new google.maps.Marker({
map: map,
position: myLatlng,
draggable: true 
}); 

geocoder.geocode({'latLng': myLatlng }, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (results[0]) {
$('#latitude,#longitude').show();
$('#address').val(results[0].formatted_address);
$('#latitude').val(marker.getPosition().lat());
$('#longitude').val(marker.getPosition().lng());
infowindow.setContent(results[0].formatted_address);
infowindow.open(map, marker);
}
}
});

google.maps.event.addListener(marker, 'dragend', function() {

geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (results[0]) {
$('#address').val(results[0].formatted_address);
$('#countrySelected').val(results[0].address_components[4].long_name);
$('#latitude').val(marker.getPosition().lat());
$('#longitude').val(marker.getPosition().lng());
var latitudes = marker.getPosition().lat();
infowindow.setContent(results[0].formatted_address);
infowindow.open(map, marker);
}
}
});
});

}
<?php
}
if(isset($_SESSION['editID']))
{
    ?>
    function initialize(){
var mapOptions = {
zoom: 4,
center: myLatlng,
mapTypeId: google.maps.MapTypeId.ROADMAP
};

map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

marker = new google.maps.Marker({
map: map,
position: myLatlng,
draggable: true 
}); 

geocoder.geocode({'latLng': myLatlng }, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (results[0]) {
$('#latitude,#longitude').show();
$('#address').val(results[0].formatted_address);
$('#latitude').val(marker.getPosition().lat());
$('#longitude').val(marker.getPosition().lng());
infowindow.setContent(results[0].formatted_address);
infowindow.open(map, marker);
}
}
});

google.maps.event.addListener(marker, 'dragend', function() {

geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (results[0]) {
$('#newAddress').val(results[0].formatted_address);
$('#newCountrySelected').val(results[0].address_components[4].long_name);
$('#newLatitude').val(marker.getPosition().lat());
$('#newLongitude').val(marker.getPosition().lng());
var latitudes = marker.getPosition().lat();
infowindow.setContent(results[0].formatted_address);
infowindow.open(map, marker);
}
}
});
});

}

<?php } ?>

google.maps.event.addDomListener(window, 'load', initialize);
</script> 