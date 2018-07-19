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

// MARKERS
    function defineIcon(url,w=30,h=40) {
        var markIcon = L.icon({
            iconUrl: url,
            iconSize: [w,h],
            iconAnchor: [15, 35]
        });

        return markIcon;
    }

    var markMain = defineIcon('assets/gis/markers/bermain.png');
    var markMakan = defineIcon('assets/gis/markers/makan.png');
    var markWisata = defineIcon('assets/gis/markers/wisataalam.png');
    var markHotel = defineIcon('assets/gis/markers/hotel.png');
    var markHerit = defineIcon('assets/gis/markers/sejarah.png');
    var markOleh = defineIcon('assets/gis/markers/oleholeh.png');

// MAIN
    // FOR MAIN MAP
    var mainLayer = new L.LayerGroup();
    var mkanLayer = new L.LayerGroup();
    var wisaLayer = new L.LayerGroup();
    var hotlLayer = new L.LayerGroup();
    var sejrLayer = new L.LayerGroup();
    var olehLayer = new L.LayerGroup();

    var poiGroup = {
        "Tempat Bermain" : mainLayer,
        "Tempat Makan" : mkanLayer,
        "Wisata Alam" : wisaLayer,
        "Hotel" : hotlLayer,
        "Tempat Sejarah" : sejrLayer,
        "Oleh Oleh" : olehLayer,
    };

    var activeLayer = [googleRoadmap, mainLayer, mkanLayer, wisaLayer, hotlLayer, sejrLayer, olehLayer];

    function initMap(lat,lng,actvLyr) {
        var map = new L.Map('map', {
            center: new L.LatLng(lat, lng),
            zoom: 12, 
            layers: actvLyr
        });

        return map;
    }
    
    var map = initMap(-7.982507, 112.630770, activeLayer);

    map.addControl(new L.Control.Scale());
    map.addControl(new L.Control.Layers(baseMaps));
    map.addControl(new L.Control.Layers("", poiGroup))

    // FOR MARKERS
        function showPOI(data,iconM,layer) {
            for(var i=0; i<data.length; i++) {
                var bPopup = 
                    '<a href="detail_tempat.php?id='+data[i][3]+'&kat='+data[i][4]+'">' +
                        data[i][0]+'<br>' +
                        '<center><img width="80px" src="assets/gis/foto_tempat/'+data[i][5]+'"></center>'
                    '</a>';
            
                marker = new L.Marker.Text(new L.LatLng(data[i][1],data[i][2]), data[i][0], {icon: iconM})
                    .bindPopup(bPopup);

                layer.addLayer(marker);
            }
        }

        var marker = "";
        var layer = "";
        if(detail[0][4] == "tempat_bermain") {
            marker = defineIcon('assets/gis/markers/bermain.png');
            layer = mainLayer;
        } else if(detail[0][4] == "tempat_makan") {
            marker = defineIcon('assets/gis/markers/makan.png');
            layer = mkanLayer;
        } else if(detail[0][4] == "wisata_alam") {
            marker = defineIcon('assets/gis/markers/wisataalam.png');
            layer = wisaLayer;
        } else if(detail[0][4] == "hotel_penginapan") {
            marker = defineIcon('assets/gis/markers/hotel.png');
            layer = hotlLayer;
        } else if(detail[0][4] == "tempat_sejarah") {
            marker = defineIcon('assets/gis/markers/sejarah.png');
            layer = sejrLayer;
        } else if(detail[0][4] == "oleh_oleh") {
            marker = defineIcon('assets/gis/markers/oleholeh.png');
            layer = olehLayer;
        }

        showPOI(detail,marker,layer);