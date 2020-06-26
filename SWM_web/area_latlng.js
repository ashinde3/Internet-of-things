

      	function setMapOnAll(map) {
	        for (var i = 0; i < markers.length; i++) {
	          markers[i].setMap(map);
	        }
	      }

	      // Removes the markers from the map, but keeps them in the array.
	      function clearMarkers() {
	        setMapOnAll(null);
	      }

	      // Shows any markers currently in the array.
	      function showMarkers() {
	        setMapOnAll(map);
	      }

	      // Deletes all markers in the array by removing references to them.
	      function deleteMarkers() {
	        clearMarkers();
	        markers = [];
	      } 
          
        function create_marker(lat , lng)
        {
                var myLatLng = new google.maps.LatLng(parseFloat(lat),parseFloat(lng));
               //var myLatLng = {lat: lat, lng: lng};
                //console.log(myLatLng);
                 var marker = new google.maps.Marker({
                   map: map,
                   //icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
                   position: myLatLng,
                   title: "Latitude = "+lat+"  Longitude = "+lng
                 });

                 markers.push(marker);
                 //console.log(markers);

                 infowindow = new google.maps.InfoWindow();
               google.maps.event.addListener(marker, 'click', function() {
                 //console.log(place);
                 infowindow.setContent("Latitude = "+lat+"<br>Longitude = "+lng);
                 infowindow.open(map, this);
               });
        }


        function area(e)
        {
			//animate
			$('html, body').animate({
				scrollTop: $("#map").offset().top
	        }, 3000);
              console.log(e);
              
    	// 	 $('#map').css("width" , "100%");
			  // $('#map').css("height" , "800px");

        	  if(markers.length > 0)
			  		deleteMarkers();
	          $.ajax({
	            url : "area_latlng.php",
	            type : "POST",
	            async: true,
	            data : {
	              "id" : e,
	            },
	            success : function(data){
	              
	              var js = JSON.parse(data);
	              //console.log(js);
	              for(var i=0; i<js.length; i++ )
	              {
	                  create_marker(js[i].lat, js[i].lng);
	              }

	            }
	          });

	          
	          

        }
            

             
            
            



