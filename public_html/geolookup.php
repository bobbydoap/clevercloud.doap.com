<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Google Maps AJAX + MySQL/PHP Example</title>
    <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAor7iLMX0RTKbLxw629ycHRR6Yixc6OnDJZ7Qppa90Fzhaa4OmhSG1DDYysTr7bGjrz2-WZEwbwetlg&sensor=true"
            type="text/javascript"></script>

    <script type="text/javascript">
    //<![CDATA[
    var map;
    var geocoder;
// Check for geolocation support
if (navigator.geolocation) {
	// Use method getCurrentPosition to get coordinates
	navigator.geolocation.getCurrentPosition(function (position) {
		// Access them accordingly
		alert(position.coords.latitude + ", " + position.coords.longitude);
	});
}
    function load() {
      if (GBrowserIsCompatible()) {
        geocoder = new GClientGeocoder();
        map = new GMap2(document.getElementById('map'));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        map.setCenter(new GLatLng(12.13282, -85.2504), 7);

        sidebar.innerHTML = ("<center>Find Nicaragua business listings<br>$500 Business internet presence package<br><img src=http://doap.com/images/d5.png></center>"); 

      }
    }

   function searchLocations() {
     var address = document.getElementById('addressInput').value;
     geocoder.getLatLng(address, function(latlng) {
       if (!latlng) {
         alert(address + ' not found');
       } else {
         searchLocationsNear(latlng);
       }
     });
   }

   function searchLocationsNear(center) {
     var radius = document.getElementById('radiusSelect').value;
     var searchUrl = '/geotags.php?lat=' + center.lat() + '&lon=' + center.lng() + '&radius=' + radius;
     GDownloadUrl(searchUrl, function(data) {
       var xml = GXml.parse(data);
       var markers = xml.documentElement.getElementsByTagName('marker');
       map.clearOverlays();

       var sidebar = document.getElementById('sidebar');
       sidebar.innerHTML = '';
       if (markers.length == 0) {
         sidebar.innerHTML = 'No results found.<br>Contact sales@doap.com and get yor professional listing today. <br> Enhanced listing prices start at $50/yr.<br>  <a href=http://i.doap.com/images/d5.png>';
         map.setCenter(new GLatLng(13, -86), 6);
         return;
       }

       var bounds = new GLatLngBounds();
       for (var i = 0; i < markers.length; i++) {
         var name = markers[i].getAttribute('company');
         var address = markers[i].getAttribute('address');
         var city = markers[i].getAttribute('city');
         var county = markers[i].getAttribute('county');
         var zip = markers[i].getAttribute('zip');
         var website = markers[i].getAttribute('website');
         var phone = markers[i].getAttribute('phone');
         var logo = markers[i].getAttribute('logo');
         var email = markers[i].getAttribute('email');
         var distance = parseFloat(markers[i].getAttribute('distance'));
         var point = new GLatLng(parseFloat(markers[i].getAttribute('lat')),
                                 parseFloat(markers[i].getAttribute('lon')));
         
         var marker = createMarker(point, name, address, city, county, zip, email, website, phone, logo);
         map.addOverlay(marker);
         var sidebarEntry = createSidebarEntry(marker, name, address, city, county, zip, website, logo, distance);
         sidebar.appendChild(sidebarEntry);
         bounds.extend(point);
       }
       map.setCenter(bounds.getCenter(), map.getBoundsZoomLevel(bounds));
     });
   }

    function createMarker(point, name, address, city, county, zip, email, website, phone, logo, distance) {
      var marker = new GMarker(point);
      var html = '<table border=0><tr><td colspan=2><b>' + name + '</b></td></tr> ' + '<tr><td>' + logo + '</td><td>' + address + '<br>' + city + ' ' + zip + '<br>' + phone + '</td></tr><tr><td colspan=2>' + ' <a href=mailto:' + email + '>' + email + '</a>  <a href=' + website + ' target=_NEW> Website</a></td></tr></table>'; 
      GEvent.addListener(marker, 'click', function() {
        marker.openInfoWindowHtml(html);
      });
      return marker;
    }

    function createSidebarEntry(marker, name, address, city, county, zip, website, logo, distance) {
      var div = document.createElement('div');
      var html = '<table border=0><tr><td colspan=2><b>' + name + '</b></td></tr><tr><td>' + logo + '</td><td>' + '(' + distance.toFixed(1) + ' miles from you.)<br/>' + address + '<br>' + city + ', ' + zip + '<br>';
      div.innerHTML = html;
      div.style.cursor = 'pointer';
      div.style.marginBottom = '0px'; 
      GEvent.addDomListener(div, 'click', function() {
        GEvent.trigger(marker, 'click');
      });
      GEvent.addDomListener(div, 'mouseover', function() {
        div.style.backgroundColor = '#ddd';
      });
      GEvent.addDomListener(div, 'mouseout', function() {
        div.style.backgroundColor = '#fff';
      });
      return div;
    }
    //]]>

  </script>
  </head>

  <body onload="load()" onunload="GUnload()">
    Address: <input type="text" id="addressInput" value=""/>
     

    Radius: <select id="radiusSelect">

      <option value="1000">1000 mi.</option>
      <option value="200" selected>200 mi.</option>
      <option value="100">100 mi.</option>
      <option value="50">50 mi.</option>
      <option value="25">25 mi.</option>
      <option value="10">10 mi.</option>
      <option value="5">5 mi.</option>

    </select>

    <input type="button" onclick="searchLocations()" value="Search Locations"/>
    <br/>    
    <br/>
<div style="width:100%; font-family:Verdana; font-size:11px; border:0px solid black">
  <table> 
    <tbody> 
      <tr id="cm_mapTR">

        <td width="300" valign="top"> <div id="sidebar" style="overflow: auto; height: 400px; font-size: 11px; color: #000"></div>

        </td>
        <td> <div id="map" style="overflow: hidden; width:550px; height:700px; "></div> </td>

      </tr> 
    </tbody>
  </table>
</div>    
  </body>
</html>
