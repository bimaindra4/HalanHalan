<!-- Vendor -->
<script src="assets/frontend/vendor/jquery/jquery.min.js"></script>
<script src="assets/frontend/vendor/popper/umd/popper.min.js"></script>
<script src="assets/frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/frontend/vendor/common/common.min.js"></script>
<script src="assets/frontend/vendor/jquery.validation/jquery.validation.min.js"></script>
<script src="assets/frontend/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
<script src="assets/frontend/vendor/isotope/jquery.isotope.min.js"></script>
<script src="assets/frontend/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/frontend/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="assets/frontend/vendor/vide/vide.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="assets/frontend/js/theme.js"></script>

<!-- Current Page Vendor and Views -->
<script src="assets/frontend/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>		
<script src="assets/frontend/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>		
<script src="assets/frontend/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js"></script>		
<script src="assets/frontend/js/views/view.home.js"></script>

<!-- Theme Custom -->
<script src="assets/frontend/js/custom.js"></script>
<script src="assets/frontend/js/examples/examples.gallery.js"></script>	

<!-- Theme Initialization Files -->
<script src="assets/frontend/js/theme.init.js"></script>
<script src="assets/frontend/master/analytics/analytics.js"></script>

<!-- GIS Javascript -->
<link href="assets/gis/leaflet/dist/leaflet.css" rel="stylesheet"/>
<link href="assets/gis/pancontrol/L.Control.Pan.css" rel="stylesheet"/>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWR4K0m_9VINVwNbNVBn8HhcNlKvE4yhA"></script>
<script src="assets/gis/leaflet/dist/leaflet.js"></script>
<script src="assets/gis/pancontrol/L.Control.Pan.js" ></script>
<script src="assets/gis/Marker.Text.js"></script>
<script src="assets/gis/Bing.js"></script>
<script src="assets/gis/Google.js"></script>

<script src="assets/frontend/js/properties.js"></script>

<?php
	$uri = getAddress();
	if(strpos($uri,"detail_tempat") !== false) {
		echo '<script src="assets/gis/detail_gis.js"></script>';
	} elseif(strpos($uri,"filter_map") !== false) {
		echo '
		<script type="text/javascript">
			detail = '.$parseJs.';
		</script>
		<script src="assets/gis/filter_gis.js"></script>
		';
	} else {
		$main = parseJs("tempat_bermain");
		$makan = parseJs("tempat_makan");
		$wa = parseJs("wisata_alam");
		$hotel = parseJs("hotel_penginapan");
		$sejarah = parseJs("tempat_sejarah");
		$oleh2 = parseJs("oleh_oleh");
		$pusatkt = parseJs("pusat_kota");

		echo '
		<script type="text/javascript">
			main = '.$main.';
			makan = '.$makan.';
			wa = '.$wa.';
			hotel = '.$hotel.';
			sejarah = '.$sejarah.';
			oleh = '.$oleh2.';
			pusat = '.$pusatkt.';
		</script>
		<script src="assets/gis/index_gis.js"></script>
		';
	}
?>