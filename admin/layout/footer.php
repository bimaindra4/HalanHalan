            </div>
            <footer class="footer">
                <span class="heading-font-family">&copy; 2018, Bima Indra</span>
            </footer>
        </div>
        <!--/ #wrapper -->
        <!-- Scripts -->
        <script src="assets/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="assets/ajax/libs/popper.js/1.12.2/umd/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/ajax/libs/metisMenu/2.7.0/metisMenu.min.js"></script>
        <script src="assets/ajax/libs/jquery.perfect-scrollbar/0.7.0/js/perfect-scrollbar.jquery.js"></script>
        <script src="assets/ajax/libs/ion-rangeslider/2.1.7/js/ion.rangeSlider.min.js"></script>
        <script src="assets/ajax/libs/datatables/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/theme.js"></script>
        <script src="assets/js/custom.js"></script>
        
        <script src="../assets/gis/leaflet/dist/leaflet.js"></script>
        <script src="../assets/gis/pancontrol/L.Control.Pan.js" ></script>
        <script src="../assets/gis/Bing.js"></script>
        <script src="../assets/gis/Google.js"></script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWR4K0m_9VINVwNbNVBn8HhcNlKvE4yhA"></script>

        // Javascript for GIS
        <script type="text/javascript">
            // Layer for basemap
            var googleRoadmap = new L.Google('ROADMAP');
            var cloudmade = new L.TileLayer('http://{s}.tile.cloudmade.com/4c09f91134dc40008537e4bbdf6b606e/22677/256/{z}/{x}/{y}.png');

            // Init basemap
            var baseMaps = {
                'Google Roadmap': googleRoadmap,
                'Cloudmade': cloudmade,
            };

            // menentukan koordinat, Zoom dan Layer aktif 
            var map = new L.Map('map_bermain',{
                center: new L.LatLng(-7.982486, 112.630791),
                zoom: 15, 
                layers: [googleRoadmap]
            });

            map.addControl(new L.Control.Scale());
            map.addControl(new L.Control.Layers(baseMaps)); 
            map.on('click', onMapClick);

            function onMapClick(e) {
                var latlngStr = '(' + e.latlng.lat + ', ' + e.latlng.lng + ')';

                var lati = e.latlng.lat;
                lati = lati.toFixed(7);

                var long = e.latlng.lng;
                long = long.toFixed(7);
                
                $("#l1").val(lati);
                $("#l2").val(long);
                console.log(latlngStr);
            }
            
            /**
            function initialize() {  
                
                // add marker
                marker = new L.marker([-7.965929,112.607716], {icon: iconMarker})
                    .bindPopup("A")
                    .addTo(map);
                
                marker = new L.marker([], {icon: iconMarker})
                    .bindPopup("B")
                    .addTo(map);

                // Menampilkan panel pilihan peta dasar
                map.addControl(new L.Control.Scale());
                map.addControl(new L.Control.Layers(baseMaps)); 
                

                map.addControl(new L.Control.Scale());
                map.addControl(new L.Control.Layers(baseMaps,poiGroup));
            }

            function onLocationFound(e) {
                var radius = e.accuracy / 2;
                L.marker(e.latlng, {icon: iconMarker}).addTo(map)
                    .on('click', function() {
                        confirm("are you sure?");
                    });

                L.circle(e.latlng, radius).addTo(map);
            }

            function onLocationError(e) {
                alert(e.message);
            }

            $('#locate-position').on('click', function(){
                map.locate({setView: true, maxZoom: 15});
            });

            map.on('locationfound', onLocationFound);
            map.on('locationerror', onLocationError);

            $("select#wilayah").change(function() {
                var val_id = document.getElementById("wilayah").value;

                $.ajax({
                    url: "jquery/kecamatan.php",
                    type: "GET",
                    data: {"id": val_id},
                    dataType: "JSON",
                    success: function(data) {
                        $("#kec").html(data);
                    }
                });
            });
            */
            
            function chKecamatan(val) {
                $.ajax({
                    url: "jquery/kecamatan.php",
                    type: "GET",
                    data: {"id": val},
                    success: function(data) {
                        $("#kecamatan").html(data);
                    }
                });
            }
        </script>
    </body>
</html>