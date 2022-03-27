if ($(window).width() < 769) {
    var map = L.map('europe-map', {
        center: [53.09402405506328, 13.491210937500002],
        zoom: 5,
        scrollWheelZoom: false,
        zoomControl: false
    });
}

else {

    var map = L.map('europe-map', {
        center: [53.09402405506328, 13.491210937500002],
        zoom: 4,
        scrollWheelZoom: false,
        zoomControl: false
    });
}

map.dragging.disable();
map.touchZoom.disable();
map.doubleClickZoom.disable();
map.scrollWheelZoom.disable();

var country = '';

var myIcon = L.divIcon({

    html: '<i class="fas fa-map-marker-alt"></i>',
    iconSize: new L.Point(25, 25),
    className: 'pin1'

});

var citiesHolder = L.layerGroup();

function back() {
    citiesHolder.clearLayers();
    map.removeLayer(citiesHolder);
    europe.setStyle({
        fillOpacity: 0,
        color: '#B4B4B4',
        weight: 1
    });
    map.flyTo([53.09402405506328, 13.491210937500002], 4);
    document.getElementById('mapHeader').innerHTML = ("<h3 class='mapH3'></h3>");
    document.getElementById('mapList').innerHTML = ("");
    europe.eachLayer(function (layer) {

        if (countries.includes(layer.feature.properties.NAME)) {

            var ul = document.getElementById('mapList');
            var li = document.createElement('li');
            li.className = 'mapItemLi';
            //li.appendChild(document.createTextNode(layer.feature.properties.NAME));
            li.innerHTML = ("<span id = '" + layer.feature.properties.NAME + "' onclick = selectCountry('" + layer.feature.properties['NAME'] + "') onmouseover = highlightCountry('" + layer.feature.properties['NAME'] + "') onmouseout = clearHighlightCountry('" + layer.feature.properties['NAME'] + "')><i class='icon-map-pin'></i>" + layer.feature.properties.NAME_RU + "</span>");
            ul.appendChild(li);
        }
    });
}

var ul = document.getElementById('mapList');

function highlightFeature(e) {
    var layer = e.target;
    if (layer.feature.properties.is == true && map.hasLayer(citiesHolder) == false) {
        document.getElementById(layer.feature.properties['NAME']).className = "mapItemLiSelected";
        layer.setStyle({
            fillOpacity: 0,
            color: '#FFBB00',
            weight: 3
        });
    }
}

function resetHighlight(e) {
    var layer = e.target;
    if (layer.feature.properties.is == true && map.hasLayer(citiesHolder) == false) {
        document.getElementById(layer.feature.properties['NAME']).className = "mapItemLi";
        layer.setStyle({
            fillOpacity: 0,
            color: '#B4B4B4',
            weight: 1
        });
    }
}

function highlightCountry(e) {
    europe.eachLayer(function (layer) {
        if (layer.feature.properties.NAME == e) {
            layer.setStyle({
                fillOpacity: 0,
                color: '#FFBB00',
                weight: 3
            });
        }
    })
}

function clearHighlightCountry(e) {

    europe.eachLayer(function (layer) {
        if (layer.feature.properties.NAME == e) {
            layer.setStyle({
                fillOpacity: 0,
                color: '#B4B4B4',
                weight: 1
            });
        }
    })
}

function getDefaultIcon() {

    return new L.divIcon({
        html: '<i class="fas fa-map-marker-alt"></i>',
        iconSize: new L.Point(25, 25),
        className: 'pin1'
    });
}

function getHighlightIcon(e) {

    return new L.divIcon({
        html: '<i class="fas fa-map-marker-alt"></i>',
        iconSize: new L.Point(25, 25),
        className: 'pin2'
    });
    highlight = layer;
}

var highlight = null

function removeHighlight() {
    // Check for highlight
    if (highlight !== null) {
        // Set default icon
        highlight.setIcon(getDefaultIcon());
        // Unset highlight
        highlight = null;
    }
}
var countries = document.querySelector("#map").getAttribute("data-countries").split(", ");
var europe = new L.GeoJSON.AJAX("/../wp-content/themes/church/data/europe.geojson",

    {
        onEachFeature: function (feature, layer) {
            var ul = document.getElementById('mapList');
            if (countries.includes(layer.feature.properties.NAME)) {
                var li = document.createElement('li');
                li.className = 'mapItemLi';
                // li.innerHTML = ("<span id = '" + layer.feature.properties.NAME + "' onclick = selectCountry('" + feature.properties['NAME'] + "')><i class='icon-map-pin'></i>" + layer.feature.properties.NAME_RU + "</span>");
                ul.appendChild(li);
                li.innerHTML = ("<span id = '" + layer.feature.properties.NAME + "' onclick = selectCountry('" + feature.properties['NAME'] + "') onmouseover = highlightCountry('" + feature.properties['NAME'] + "') onmouseout = clearHighlightCountry('" + feature.properties['NAME'] + "')><i class='icon-map-pin'></i>" + layer.feature.properties.NAME_RU + "</span>");
            }

            layer.on({
                click: function (e) {
                    if (layer.feature.properties.is == true) {
                        country = feature.properties['NAME'];

                        //resetStyle;

                        europe.setStyle({
                            fillOpacity: 0,
                            color: '#B4B4B4',
                            weight: 1
                        });

                        highlightFeature(e);
                        citiesHolder.clearLayers();
                        document.getElementById('mapHeader').innerHTML = ("<h3 class='mapH3'><i class='fas fa-arrow-left'></i>" + feature.properties['NAME_RU'] + "<h3>");
                        document.getElementById('mapList').innerHTML = "";
                        citiesHolder.addTo(map);

                        feature.properties.bounds_calculated = layer.getBounds();
                        // map.fitBounds(feature.properties.bounds_calculated);
                        map.flyToBounds(feature.properties.bounds_calculated, { 'duration': 0.5 });
                        addCities(country);
                    }
                }, mouseover: highlightFeature, mouseout: resetHighlight
            });
        },

        style: {
            fillOpacity: 0,
            color: '#B4B4B4',
            weight: 1
        }
    }).addTo(map);

addCities = function (country) {

    var ul = document.getElementById('mapList');
    ul.innerHTML = '';
    function myFilter(feature) {
        if (feature.properties.COUNTRY === country) {
            return true;
        }
    }

    var cities = new L.GeoJSON.AJAX("/?city_json=1", {
        onEachFeature: function (feature, layer) {
            if (layer.feature.properties.COUNTRY == country) {
                var li = document.createElement('li');
                li.className = 'mapItemLi';
                console.log(layer.feature.properties.WIKI);
                li.innerHTML = ("<span id='" + layer.feature.properties.NAME + "' onclick = (window.open('" + layer.feature.properties.WIKI + "','_self'))><i class='icon-map-pin'></i>" + layer.feature.properties.NAME_RU + "</span>");
                ul.appendChild(li);
            }

            layer.on({
                click: function (e) {
                    window.open(layer.feature.properties.WIKI);
                }
            })

        }, pointToLayer: function (feature, latlng) {
            console.log(latlng);
            return L.marker(latlng, {
                icon: L.divIcon({
                    html: '<div id="' + feature.properties['NAME'] + '" class="nonSelectedPin"><i class="icon-map-pin"></i><p>' + feature.properties['NAME_RU'] + '</p></div>',
                    iconSize: new L.Point(100, 25),
                    className: 'pin1'
                })
            });
        },
        filter: myFilter
    });
    cities.addTo(citiesHolder);
}

selectCity = function (name) {
    citiesHolder.eachLayer(function (layer) {
        if (layer.feature.properties.NAME == name) {
            layer.setIcon(getHighlightIcon());
        }
    });
}

selectCountry = function (name, nameRu) {
    europe.setStyle({
        fillOpacity: 0,
        color: '#B4B4B4',
        weight: 1
    });

    citiesHolder.clearLayers();
    citiesHolder.addTo(map);
    europe.eachLayer(function (layer) {
        if (layer.feature.properties.NAME == name) {
            layer.setStyle({
                fillOpacity: 0,
                color: '#FFBB00',
                weight: 3
            });

            var bounds = layer.getBounds();
            map.fitBounds(bounds);
            addCities(name);
            document.getElementById('mapHeader').innerHTML = ("<h3 class='mapH3'><i class='fas fa-arrow-left'></i>" + layer.feature.properties.NAME_RU + "<h3>");
        }
    });
}