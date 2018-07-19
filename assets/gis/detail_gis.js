// BASEMAP
    var googleRoadmap = new L.Google('ROADMAP');
    var cloudmade = new L.TileLayer('http://{s}.tile.cloudmade.com/4c09f91134dc40008537e4bbdf6b606e/22677/256/{z}/{x}/{y}.png');
    var mpn = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    var openstreetmap = new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    var googleSatellite = new L.Google('SATELLITE');
    var googleHybrid = new L.Google('HYBRID');
    var bingMap = new L.BingLayer('AruOA14CnEjyvwg0gQJbqihXo0z05kMO3u0M-zCQ8IytDsSsoUu-TwQZaOkQMBRY', {
        type: 'RoadOnDemand'
    });
    var openTopoMap = new L.TileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png');
    var stamenToner = new L.TileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}.png');
    var esriWorldImagery = new L.TileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}');
    var cartoDB = new L.TileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/rastertiles/voyager/{z}/{x}/{y}.png');
    var hikebike = new L.TileLayer('http://{s}.tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png');

    var baseMaps = {
        'Cloudmade': cloudmade, 
        'Mapnik': mpn,
        'OpenStreet Map' : openstreetmap,
        'Google Roadmap': googleRoadmap, 
        'Google Satellite': googleSatellite, 
        'Google Hybrid': googleHybrid, 
        'BING': bingMap,
        'OpenTopoMap' : openTopoMap,
        'StamenToner' : stamenToner,
        'Esri World Imagery' : esriWorldImagery,
        'CartoDB Voyager' : cartoDB,
        'HikeBike' : hikebike
    };

// MAIN
    // FOR MAIN MAP
    var latmap = document.getElementById("latmap").value;
    var lngmap = document.getElementById("lngmap").value;
   
    var map = new L.Map('map_detail', {center: new L.LatLng(latmap, lngmap),
        zoom: 15, 
        layers: [googleRoadmap]
    });

    var icoMark = L.icon({
        iconUrl: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
        iconAnchor: [15, 35]
    });

    var marker = new L.marker([latmap,lngmap], {icon: icoMark}).addTo(map);

    map.addControl(new L.Control.Scale());
    map.addControl(new L.Control.Layers(baseMaps)); 