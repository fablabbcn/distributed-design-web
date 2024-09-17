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
function initMap($el) {
  // Find marker elements within map.
  var $markers = $el.find(".marker");

  // Create gerenic map.
  var mapArgs = {
    zoom: $el.data("zoom") || 16,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    mapTypeControl: false,
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
      infowindow.open(map, marker);
    });
  }
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
