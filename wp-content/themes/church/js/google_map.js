// Initialize and add the map
function initMap() {
    // The location of Uluru
    const uluru = { lat: 51.07946015603364, lng: 17.00674446926591 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("googlemaps"), {
        zoom: 17,
        center: uluru,
        // draggable: false,
        mapTypeControl: false
    });

    // const directionsRenderer = new google.maps.DirectionsRenderer({
    //     draggable: false,
    // });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
        icon: '/img/map_logo.svg'
    });
}