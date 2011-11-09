<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>OpenStreetMap</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
 
  <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAtzGMCxvIWCLidTYJY1fR_xR6Yixc6OnDJZ7Qppa90Fzhaa4OmhQ1PhK_tS0M7v_xr5Xqs6cBa3vMCA" type="text/javascript"></script>
  <script type="text/javascript">
  //<![CDATA[
 
  function load()
  {
    if (!GBrowserIsCompatible())
        return;
 
    var copyOSM = new GCopyrightCollection("<a href=\"http://www.openstreetmap.org/\">OpenStreetMap</a>");
    copyOSM.addCopyright(new GCopyright(1, new GLatLngBounds(new GLatLng(-90,-180), new GLatLng(90,180)), 0, " "));
 
    var tilesMapnik     = new GTileLayer(copyOSM, 1, 17, {tileUrlTemplate: 'http://tile.openstreetmap.org/{Z}/{X}/{Y}.png'});
    var tilesOsmarender = new GTileLayer(copyOSM, 1, 17, {tileUrlTemplate: 'http://tah.openstreetmap.org/Tiles/tile/{Z}/{X}/{Y}.png'});
 
    var mapMapnik     = new GMapType([tilesMapnik],     G_NORMAL_MAP.getProjection(), "Mapnik");
    var mapOsmarender = new GMapType([tilesOsmarender], G_NORMAL_MAP.getProjection(), "Osmarend");
    var map           = new GMap2(document.getElementById("map"), { mapTypes: [mapMapnik, mapOsmarender] });
 
    map.addControl(new GLargeMapControl());
    map.addControl(new GMapTypeControl());
    map.setCenter( new GLatLng(55.95, -3.19), 13);
  }
 
  //]]>
  </script>
</head>
<body onload="load()" onunload="GUnload()">
 
<div id="map" style="width: 600px; height: 600px; border:1px solid gray;"></div>
 
</body>
</html>
