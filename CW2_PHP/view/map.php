<?php
$campus_map= " <div id='RHB'></div> <!-- div tags (container) to load the map into -->
    <script>
      function createMap() { <!-- create map function -->
		 zoom: 8, <!-- zoom level on load -->
		 center: RHB, <!-- create a center point -->
        var RHB = {lat: -0.036116, lng: 51.474081}; <!-- setting geolocational values -->
        var campus = new google.maps.Map(document.getElementById('RHB'){ <!-- getting the elementById 'RHB' to load within the div tags (container). -->
        });
        var RHB_marker = new google.maps.Marker({ <!-- creating a new marker -->
          position: RHB, <!-- set position to RHB , therefore assigning geolocation (See createMap()) -->
          map: campus <!-- setting the map as the campus variable made above and telling api that we want the marker on that map made above -->
        });
      }
    </script>
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDakXpQNVyex4fG0eNk0o7WlFwKL-JZpbA&callback='> <!-- my API key -->
    </script>";
echo $campus_map; // echo the above to display map.

/*	Reference (guide):

	https://developers.google.com/maps/documentation/javascript/adding-a-google-map

?>