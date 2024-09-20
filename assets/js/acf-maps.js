(function( $ ) {

/**
 * initMap
 *
 * Renders a Google Map onto the selected jQuery element
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @return  object The map instance.
 */

let mapStyles = 
[
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "on"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "featureType": "administrative",
    "elementType": "geometry",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#bdbdbd"
      }
    ]
  },
  {
    "featureType": "poi",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ffffff"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dadada"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "transit",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#c9c9c9"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {"featureType": "road.highway",elementType: "labels",stylers:[{visibility: "off"}]}, //turns off highway labels
  {"featureType": "road.arterial",elementType: "labels",stylers: [{visibility: "off"}]}, //turns off arterial roads labels
  {"featureType": "road.local",elementType: "labels",stylers: [{visibility: "off"}]}  //turns off local roads labels
]

function initMap($el) {
  // Find marker elements within map.
  var $markers = $el.find(".marker");

  // Create gerenic map.
  var mapArgs = {
    zoom: $el.data("zoom") || 16,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    mapTypeControl: false,
    streetViewControl: false,
    styles: mapStyles,
  };
  var map = new google.maps.Map($el[0], mapArgs);
  // Add markers.
  map.markers = [];
  $markers.each(function () {
    initMarker($(this), map);
  });

  // Center map based on markers.
  centerMap(map);
  initMapFilters(map);
  // Return map instance.
  return map;
}

/**
 * initMarker
 *
 * Creates a marker for the given jQuery element and map.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @param   object The map instance.
 * @return  object The marker instance.
 */
function initMarker($marker, map) {
  // Get position from marker.
  var latLng = {
    lat: parseFloat($marker.data("lat")),
    lng: parseFloat($marker.data("lng")),
  };

  // Create marker instance.
  var marker = new google.maps.Marker({
    title: $marker.data("title"),
    position: latLng,
    filter: $marker.data("filter"),
    map: map,
    icon: {
      anchor: new google.maps.Point(100, 100),
      path: "M 100, 100 m -75, 0 a 75,75 0 1,0 150,0 a 75,75 0 1,0 -150,0",
      fillColor: $marker.data("color"),
      fillOpacity: 0.9,
      strokeWeight: 0,
      scale: 0.1,
    },
  });
  // Append to reference for later use.
  map.markers.push(marker);

  // If marker contains HTML, add it to an infoWindow.
  if ($marker.html()) {
    // Create info window.
    var infowindow = new google.maps.InfoWindow({
      content: $marker.html(),
    });

    marker.infowindow = infowindow; 

    // Show info window when marker is clicked.
    google.maps.event.addListener(marker, "click", function () {
      closeAllInfoWindows(map); // Close all other info windows
      infowindow.open(map, marker);
    });
  }
}

function closeAllInfoWindows(map) {
  map.markers.forEach(function (marker) {
    if (marker.infowindow) {
      marker.infowindow.close();
    }
  });
}

/**
 * centerMap
 *
 * Centers the map showing all markers in view.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   object The map instance.
 * @return  void
 */
function centerMap(map) {
  // Create map boundaries from all map markers.
  var bounds = new google.maps.LatLngBounds();
  map.markers.forEach(function (marker) {
    bounds.extend({
      lat: marker.position.lat(),
      lng: marker.position.lng(),
    });
  });

  // Case: Single marker.
  if (map.markers.length == 1) {
    map.setCenter(bounds.getCenter());

    // Case: Multiple markers.
  } else {
    map.fitBounds(bounds);
  }
}

function initMapFilters(map) {
  const $filters = $(".partners-map-filter");
  $filters.on("click", function () {
    var filter = $(this).data("filter");
    var bounds = new google.maps.LatLngBounds();
    var visibleMarkers = 0;

    // Remove active class from all filter buttons
    $filters.removeClass("border-black");
    $filters.addClass("border-transparent");

    // Add active class to the clicked filter button
    $(this).removeClass("border-transparent");
    $(this).addClass("border-black");

    map.markers.forEach(function (marker) {
      if (filter == "all") {
        marker.setVisible(true);
        bounds.extend(marker.getPosition());
        visibleMarkers++;
      } else {
        if (marker.filter == filter) {
          marker.setVisible(true);
          bounds.extend(marker.getPosition());
          visibleMarkers++;
        } else {
          marker.setVisible(false);
        }
      }
    });

    // close all info windows
    map.markers.forEach(function (marker) {
      if (marker.infowindow) {
        marker.infowindow.close();
      }
    });

    map.fitBounds(bounds);

    // Set minimum zoom level
    var listener = google.maps.event.addListener(map, "idle", function () {
      if (map.getZoom() > 8 && visibleMarkers === 1) {
        map.setZoom(8);
      }
      google.maps.event.removeListener(listener);
    });
  });
}

// Render maps on page load.
$(document).ready(function () {
  $(".acf-map").each(function () {
    const map = initMap($(this));
  });
});

})(jQuery);
