<?php
if(isset($_POST['submit'])){
$id = $_POST['store'];
//echo $id;

include('config.php');
$sql1 = 'SELECT bins_id, lat, lng FROM bins where t_id ="'.$id.'" and bins_cap_fill > 80 order by bins_cap_fill DESC';
$pos = array();

if (mysqli_query($db, $sql1)) {
echo "";
} else {
echo "Error: " . $sql1 . "<br>" . mysqli_error($db);
}
$result = mysqli_query($db , $sql1);
if (mysqli_num_rows($result) > 0) {

while($row = mysqli_fetch_array($result)) {

 $pos[] = array(
        "lat" => $row['lat'],
        "lng" => $row['lng'],

    );


}
//echo $pos[1]['lat'];
}

?>




<!DOCTYPE html>
<html>
  <head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Waypoints in directions</title>
    <style>
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        float: left;
        width: 70%;
        height: 100%;
      }
      #right-panel {
        margin: 20px;
        border-width: 2px;
        width: 20%;
        height: 400px;
        float: left;
        text-align: left;
        padding-top: 0;
      }
      #directions-panel {
        margin-top: 10px;
        background-color: #FFEE77;
        padding: 10px;
        overflow: scroll;
        height: 174px;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>

    <input type="submit" id="submit" value = "Get Route From S to D">
    </div>
    <div id="directions-panel"></div>
    </div>
    <script>

    var positions = <?php echo json_encode($pos) ?>;// don't use quotes
    console.log(positions[0].lat + " " + positions[0].lng + " " + positions.length);


      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: {lat: 42.1048817, lng: -75.9360608}
        });
        directionsDisplay.setMap(map);

        document.getElementById('submit').addEventListener('click', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var waypts = [];

        for (var i = 0; i < positions.length; i++) {
            var f = new google.maps.LatLng(positions[i].lat, positions[i].lng);
            waypts.push({
              location: f,
              stopover: true
            });

        }

        directionsService.route({
          origin: "42.1048801, -75.9360600",
          destination: "42.1048817, -75.9360608",
          waypoints: waypts,
          optimizeWaypoints: true,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
                  '</b><br>';
              summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
            }
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhuYfTFXBzzvllTaz0tnE9aNC_uaagwVc&callback=initMap">
    </script>
  </body>
</html>

<?php
}
else
{

  echo "mea";
}
?>
