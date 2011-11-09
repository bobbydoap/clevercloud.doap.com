<?php  
$center_lat = $_GET[lat];
$center_lng = $_GET[lon];
$radius = $_GET[radius];

// Start XML file, create parent node
$dom = new DOMDocument();
$node = $dom->createElement('markers');
$parnode = $dom->appendChild($node);


// Opens a connection to a mySQL server
$connection=mysql_connect ('doap-restore2.clrweg9qtztw.us-west-1.rds.amazonaws.com', 'root', 'fr1ck0ff');
if (!$connection) {
  die("Not connected : " . mysql_error());
}

// Set the active mySQL database
$db_selected = mysql_select_db('bobby', $connection);
if (!$db_selected) {
  die ("Can\'t use db : " . mysql_error());
}

// Search the rows in the markers table
$query = sprintf("SELECT websites.company, websites.Address, NI.city, NI.departamento, NI.address, websites.Zip, NI.lat, NI.lon, websites.url, websites.email, websites.Logo, websites.Phone, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lon ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM websites, NI WHERE websites.Zip = NI.zip_code HAVING distance < '%s' ORDER BY distance LIMIT 0 , 10",
  mysql_real_escape_string($center_lat),
  mysql_real_escape_string($center_lng),
  mysql_real_escape_string($center_lat),
  mysql_real_escape_string($radius));
$result = mysql_query($query);

$result = mysql_query($query);
if (!$result) {
  die("Invalid query: " . mysql_error());
}


header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("company", $row['Company']);
  $newnode->setAttribute("address", $row['Address']);
  $newnode->setAttribute("city", $row['city']);
  $newnode->setAttribute("county", $row['county']);
  $newnode->setAttribute("zip", $row['Zip']);
  $newnode->setAttribute("email", $row['Email']);
  $newnode->setAttribute("phone", $row['Phone']);
  $newnode->setAttribute("website", $row['Website']);
  $newnode->setAttribute("logo", $row['Logo']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lon", $row['lon']);
  $newnode->setAttribute("distance", $row['distance']);
}

echo $dom->saveXML();
?>
