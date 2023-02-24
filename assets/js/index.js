
/**
 * @license
 * Copyright 2019 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
// [START maps_add_map]
// Initialize and add the map
function initMap() {
    // [START maps_add_map_instantiate_map]
    // The location of Uluru
    const uluru = { lat: 37.876, lng: -4.793 };
    // The map, centered at Historiador
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 4,
      center: manuel,
    });
    // [END maps_add_map_instantiate_map]
    // [START maps_add_map_instantiate_marker]
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
      position: manuel,
      map: map,
    });
    // [END maps_add_map_instantiate_marker]
  }
  
  window.initMap = initMap;
  // [END maps_add_map]