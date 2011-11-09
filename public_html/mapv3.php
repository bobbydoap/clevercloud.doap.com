<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Simple SlippyMap using Google Maps v3 API</title>
		<script type="text/javascript"
			src="http://maps.google.com/maps/api/js?sensor=true"></script>
		<script type="text/javascript">
var osmMapType = new google.maps.ImageMapType({
	getTileUrl: function(coord, zoom) {
		return "http://tile.openstreetmap.org/" +
		zoom + "/" + coord.x + "/" + coord.y + ".png";
	},
	tileSize: new google.maps.Size(256, 256),
	isPng: true,
	alt: "OpenStreetMap layer",
	name: "OpenStreetMap"
});
 
var map;
function initialize(){
	var latlng = new google.maps.LatLng(57, 21);
	var mapOpts = {
		zoom: 3,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		disableDefaultUI: false
	};
	map = new google.maps.Map(document.getElementById("map"), mapOpts);
	map.setCenter(latlng);	map.setZoom(3);
	map.overlayMapTypes.insertAt(0, osmMapType);
	//map1.mapTypes.set('OpenStreetMap', osmMapType);
	map.setMapTypeId('OpenStreetMap');
}
		</script>
		<style>/* Style inspired by http://osm.lonvia.de/world_hiking.html */
html, body, .slippymap{
	height: 100%;
	width: 100%;
	margin: 0;
	padding: 0;
	}
.slippymap{
	width: 99.5%;
	height: 99.5%;
	outline:1px solid gray;
	}
header, footer{
	position:fixed;
	left:0;
	right:0;
	width:100%
	margin: 0;
	padding: 0.21em;
	z-index:2;
	background:#EED;
	}
h1 {
	font-size:1.5em;
	font-weight:bold;
	margin:0;
	}
header{
	border-bottom:2px solid #531;
	top:0;
	}
footer{
	border-top:2px solid #531;
	bottom:0;
	}
		</style> 
	</head>
	<body onload="initialize()">
		<header>
			<h1>Slippy OpenStreetMap Map</h1>
		</header>
		<div id="map" class="slippymap" style="float:left;"></div>
		<footer>
			Mapdata ©<a href=\"http://www.openstreetmap.org/\">OpenStreetMap</a>
				and contributors under <a
				href="http://creativecommons.org/licenses/by-sa/2.0/"
				>CC-bySA</a> license.
		</footer>
	</body>
</html>
